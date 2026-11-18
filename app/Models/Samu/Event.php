<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Samu\Mobile;
use App\Models\Samu\Call;
use App\Models\Samu\Shift;
use App\Models\Samu\ReceptionPlace;
use App\Models\User;
use App\Models\Commune;
use App\Models\CodConIdentifierType;
use App\Models\Gender;
use App\Models\Organization;

class Event extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;

    protected $table = "samu_events";

    protected $fillable = [
        'counter',
        'date',

        'shift_id',
        'call_id',
        'key_id',
        'return_key_id',
        'mobile_in_service_id',
        'mobile_id',
        'external_crew',

        'observation',

        /* Tiempos */
        'departure_at',
        'mobile_departure_at',
        'mobile_arrival_at',
        'route_to_healtcenter_at',
        'healthcenter_at',
        'patient_reception_at',
        'return_base_at',
        'on_base_at',

        'address',
        'address_reference',
        'commune_id',

        /* Paciente */
        'patient_unknown',
        'patient_identifier_type_id',
        'patient_identification',
        'patient_name',
        'gender_id',
        'birthday',
        'age_year',
        'age_month',
        'prevision',
        'run_fixed',
        'verified_fonasa_at',

        /* Recepción en centro asistencial */
        'reception_detail',
        'establishment_id',
        'establishment_details',
        'reception_person',
        'reception_place_id',
        'rau',

        'treatment',
        'observation_sv',

        'status',
    ];

    /**
     * The casted attributes.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
        'departure_at' => 'datetime',
        'mobile_departure_at' => 'datetime',
        'mobile_arrival_at' => 'datetime',
        'route_to_healtcenter_at' => 'datetime',
        'healthcenter_at' => 'datetime',
        'patient_reception_at' => 'datetime',
        'return_base_at' => 'datetime',
        'on_base_at' => 'datetime',
        'birthday' => 'date',
    ];

    protected $appends = [
        'color',
        'date_format'
    ];

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    /**
     * Un evento tiene muchas llamadas secundarias
     */
    public function calls()
    {
        return $this->belongsToMany(Call::class, 'samu_call_event');
    }

    /**
     * Llamada Principal
     */
    public function call()
    {
        return $this->belongsTo(Call::class);
    }

    public function key()
    {
        return $this->belongsTo(Key::class);
    }

    public function returnKey()
    {
        return $this->belongsTo(Key::class, 'return_key_id');
    }

    public function mobileInService()
    {
        return $this->belongsTo(MobileInService::class);
    }

    public function mobile()
    {
        return $this->belongsTo(Mobile::class);
    }

    public function establishment()
    {
        return $this->belongsTo(Organization::class, 'establishment_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function identifierType()
    {
        return $this->belongsTo(CodConIdentifierType::class, 'patient_identifier_type_id');
    }

    public function receptionPlace()
    {
        return $this->belongsTo(receptionPlace::class, 'reception_place_id');
    }

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'samu_event_user', 'event_id')
            ->using(EventUser::class)
            ->withPivot('id', 'job_type_id')
            ->withTimestamps();
    }

    public function vitalSigns()
    {
        return $this->hasMany(VitalSign::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function getCrewAttribute()
    {
        $crew = null;

        if ($this->mobileInService && $this->mobileInService->crew && $this->departure_at)
            $crew = $this->mobileInService->crew->where('pivot.assumes_at', '<=', $this->departure_at);

        return $crew;
    }

    public function getJobsAttribute()
    {
        $jobs = null;

        if ($this->shift && $this->shift->users && $this->departure_at) {
            $jobs = $this->shift->users->where('pivot.assumes_at', '<=', $this->departure_at)
                ->where('pivot.leaves_at', '>=', $this->departure_at);
        }

        return $jobs;
    }

    public function getMobileInLettersAttribute()
    {
        $mobile = $this->mobile ?? optional($this->mobileInService)->mobile;
        if ($mobile) {
            return trim($mobile->code . ' ' . $mobile->name);
        }
        return null;
    }

    public function getMobileInstitutionAttribute()
    {
        $mobile = $this->mobile ?? optional($this->mobileInService)->mobile;
        if ($mobile) {
            return $mobile->managed ? 'SAMU' : 'APS';
        }
        return null;
    }

    public function getOriginEstablishmentAttribute()
    {
        if ($this->relationLoaded('originEstablishment') && $this->originEstablishment) {
            return $this->originEstablishment->name;
        }

        $text = strtoupper(($this->address ?? '') . ' ' . ($this->address_reference ?? ''));
        if ($this->call) {
            $text .= ' ' . strtoupper(($this->call->address ?? '') . ' ' . ($this->call->address_reference ?? ''));
        }
        $text = trim($text);

        if (empty($text)) {
            return null;
        }

        $abbreviations = [
            '/\bHETG\b/' => 'Hospital Dr. Ernesto Torres Galdames (Iquique)',
            '/\bHAH\b/'  => 'Hospital Alto Hospicio',
        ];
        foreach ($abbreviations as $pattern => $fullName) {
            if (preg_match($pattern, $text)) {
                return $fullName;
            }
        }

        static $samuEstablishments = null;
        if ($samuEstablishments === null) {
            $samuEstablishments = Organization::whereHas('samu')->get(['id', 'name', 'alias']);
        }

        foreach ($samuEstablishments as $est) {
            $name = strtoupper($est->name);
            $alias = strtoupper($est->alias ?? '');

            if (!empty($alias) && str_contains($text, $alias)) {
                return $est->name;
            }
            if (str_contains($text, $name)) {
                return $est->name;
            }

            $simpleName = trim(preg_replace('/\s*\(.*?\)\s*/', '', $est->name));
            if (!empty($simpleName) && str_contains($text, strtoupper($simpleName))) {
                return $est->name;
            }
        }

        foreach ($samuEstablishments as $est) {
            $clean = strtoupper(preg_replace('/^(POSTA DE SALUD RURAL|CENTRO DE SALUD FAMILIAR|HOSPITAL REGIONAL|HOSPITAL|SAPU|SAR|CESFAM|POSTA RURAL|POSTA)\s+/i', '', $est->name));
            $clean = trim(preg_replace('/\s*\(.*?\)\s*/', '', $clean));

            if (strlen($clean) >= 4) {
                $words = explode(' ', $clean);
                $keyword = end($words);
                if (strlen($keyword) >= 4 && str_contains($text, $keyword)) {
                    if (preg_match('/\b(SAR|SAPU|POSTA|CESFAM|CECOSF|HOSPITAL|CLINICA)\b/i', $text)) {
                        return $est->name;
                    }
                }
            }
        }

        return null;
    }

    public function getMobileTypeAttribute()
    {
        if ($this->mobileInService)
            return optional(optional($this->mobileInService)->type)->name;
        else
            return optional(optional($this->mobile)->type)->name;
    }

    public function getFullAddressAttribute()
    {
        $full_address = $this->address;
        if ($this->address_reference)
            $full_address = "$this->address ($this->address_reference)";
        return $full_address;
    }

    public function getColorAttribute()
    {
        return $this->getStatus(0);
    }

    public function getEventStatusAttribute()
    {
        return $this->getStatus(1);
    }

    public function getDateFormatAttribute()
    {
        if ($this->date != null)
            return $this->date->format('Y-m-d');
        return null;
    }

    public function getStatus($option)
    {
        $status = null;
        $color = '#ffffff';
        $statusMap = [
            'departure_at' => ['Aviso de salida', '#F9C8C8'],
            'mobile_departure_at' => ['Rumbo a destino', '#F4F3CD'],
            'mobile_arrival_at' => ['En destino', '#D3DFEE'],
            'route_to_healtcenter_at' => ['En ruta AP', '#E0D0F1'],
            'healthcenter_at' => ['En AP', '#B2E3E6'],
            'patient_reception_at' => ['AP', '#C3E9D9'],
            'return_base_at' => ['Disponible', '#C3E9D9'],
            'on_base_at' => ['Disponible', '#B4F8C6'],
        ];

        foreach ($statusMap as $field => $values) {
            if ($this->$field) {
                $status = $values[0];
                $color = $values[1];
            }
        }

        return $option ? $status : $color;
    }

    public function scopeOnlyValid($query)
    {
        $exceptKey = ['605', '606'];
        return $query->whereHas('key', function ($query) use ($exceptKey) {
            $query->whereNotIn('key', $exceptKey);
        });
    }
}
