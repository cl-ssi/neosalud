<?php

namespace App\Models\Some;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sic extends Model
{
    use HasFactory;


    protected $fillable = [
        'sic_number',
        'sic_number_ges',
        'request_date',
        'request_time',
        'entry_date',
        'entry_time',
        'health_service_code',
        'establishment_code',
        'specialty_code',
        'patient_name',
        'patient_fathers_family',
        'patient_mothers_family',
        'patient_document_type',
        'patient_rut',
        'patient_dv',
        'patient_document_number',
        'patient_sex_indicator',
        'patient_birthday',
        'patient_address',
        'patient_street_type',
        'patient_street_type',
        'patient_comune_code',
        'patient_phone_1',
        'patient_phone_2',
        'derivation_establishment_code',
        'derivation_specialty_code',
        'motive_indicator',
        'motive_consultation_detail',
        'diagnosis_hypothesis',
        'diagnosis_code',
        'auge_indicator',
        'auge_problem',
        'auge_subproblem',
        'diagnosis_basis',
        'exam_name',
        'professional_rut',
        'professional_dv',
        'professional_name',
        'professional_fathers_family',
        'professional_mothers_family',
        'professional_job_title',
        'urgency_indicator',
        'titular_rut',
        'titular_dv',
        'titular_name',
        'titular_fathers_name',
        'titular_mothers_name',
        'pension_system',
        'pension_system_categorization',
        'pension_system_expiration',
        'fonasa_number',
        'certifying_institution_rut',
        'prais',
        'patient_social_name',
        'tutor_name',
        'patient_email',
        'patient_nationality',
        'patient_ethnicity',
        'patient_marital_status',
        'status_id',
        'diagnosis_hypothesis_destination',
        'origin_observation',
        'rejected_observation'
    ];

    public function status()
    {
        return $this->belongsTo(SicStatus::class, 'status_id');
    }

    public function getFullNameAttribute()
    {
        return "$this->patient_name $this->patient_fathers_family $this->patient_mothers_family";
    }


    protected $casts = [
        'request_date' => 'date',
        'entry_date' => 'date',
        'patient_birthday' => 'date',
        'pension_system_expiration' => 'date',
    ];
}
