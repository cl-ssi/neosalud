<?php

namespace App\Models\Fq;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FqRequest extends Model
{
    use HasFactory;
    use softDeletes;

    // NOT IN BBDD
    protected $table = 'fq_requests';

    protected $fillable = [
        'name',
        'specialties',
        'other_specialty',
        'prescription_file',
        'patient_id',
        'observation_patient',
        'date_confirm',
        'attention',
        'practitioner_id',
        'value',
        'link',
        'place',
        'observation_request'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'date_confirm' => 'datetime',
        'date_confirm_record' => 'datetime'
    ];

    

    public function contactUser()
    {
        return $this->belongsTo('\App\Models\User', 'contact_user_id');
    }

    public function patient()
    {
        return $this->belongsTo('\App\Models\User', 'patient_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function fq_medicines()
    {
        return $this->HasMany('\App\Models\Fq\FqMedicine', 'request_id');
    }

    public function requestFiles()
    {
        return $this->HasMany('\App\Models\Fq\RequestFile', 'request_id');
    }

    public function practitioner()
    {
        return $this->belongsTo('\App\Models\Practitioner', 'practitioner_id');
    }

    public function getNameValueAttribute()
    {
        switch ($this->name) {
            case 'specialty hours':
                return 'Horas de especialidad';
                break;
            case 'dispensing':
                return 'Dispensación de receta';
                break;
            case 'home hospitalization':
                return 'Contacto con hospitalización domiciliaria';
                break;
            case 'exam request':
                return 'Solicitud de exámenes';
                break;
            default:
                return '';
                break;
        }
    }

    public function getSpecialtiesValueAttribute()
    {
        switch ($this->specialties) {
            case 'broncopulmonar':
                return 'Broncopulmonar';
                break;
            case 'otorrinolaringología':
                return 'Otorrinolaringología';
                break;
            case 'endocrinología':
                return 'Endocrinología';
                break;
            case 'gastroenterología':
                return 'Gastroenterología';
                break;
            case 'other':
                return 'Otra';
                break;
            default:
                return '';
                break;
        }
    }

    public function getOtherSpecialtiesValueAttribute()
    {
        switch ($this->other_specialty) {
            case 'kinesiología':
                return 'Kinesiología';
                break;
            case 'nutrición':
                return 'Nutrición';
                break;
            case 'enfermería':
                return 'Enfermería';
                break;
            default:
                return '';
                break;
        }
    }

    public function getStatusValueAttribute()
    {
        switch ($this->status) {
            case 'pending':
                return 'Pendiente';
                break;
            case 'complete':
                return 'Completada';
                break;
            case 'rejected':
                return 'Rachazada';
                break;
            default:
                return '';
                break;
        }
    }

    public function getAttentionValueAttribute()
    {
        switch ($this->attention) {
            case 'face-to-face':
                return 'Presencial';
                break;
            case 'teleconsultation':
                return 'Teleconsulta';
                break;
            default:
                return '';
                break;
        }
    }
}
