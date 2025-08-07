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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date',
        'departure_at',
        'mobile_departure_at',
        'mobile_arrival_at',
        'route_to_healtcenter_at',
        'healthcenter_at',
        'patient_reception_at',
        'return_base_at',
        'on_base_at',
        'birthday',
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
        $color = 'secondary';
        $statusMap = [
            'on_base_at' => ['Disponible', '#13cf45'],
            'return_base_at' => ['Disponible', '#7ccfab'],
            'route_to_healtcenter_at' => ['En ruta AP', '#a06cd4'],
            'healthcenter_at' => ['En AP', '#45b3c4'],
            'patient_reception_at' => ['AP', '#7ccfab'],
            'mobile_arrival_at' => ['En destino', '#5e88c0'],
            'mobile_departure_at' => ['Rumbo a destino', '#e3e07d'],
            'departure_at' => ['Aviso de salida', '#F59898']
        ];

        foreach ($statusMap as $field => $values) {
            if ($this->$field) {
                return $option ? $values[0] : $values[1];
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
