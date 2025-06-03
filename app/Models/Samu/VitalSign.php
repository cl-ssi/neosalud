<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VitalSign extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "samu_vital_signs";

    protected $fillable = [
        'fc',
        'fr',
        'pa',
        'pam',
        'gl',
        'soam',
        'soap',
        'hgt',
        'fill_capillary',
        't',
        'p',
        'lcf',
        'eva',
        'co2',
        'registered_at',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = [
        'created_at',
        'updated_at',
        'registered_at',
    ];

    protected $names = [
        'fc'                => 'Frecuencia Cardiaca',
        'fr'                => 'Frecuencia Respiratoria',
        'pa'                => 'Presión Arterial',
        'pam'               => 'Presión Arterial Media',
        'gl'                => 'Glucosa',
        'soam'              => 'Saturación de Oxígeno en Sangre Arterial',
        'soap'              => 'Saturación de Oxígeno en Sangre Venosa',
        'hgt'               => 'Hemoglobina Glucosilada',
        'fill_capillary'    => 'Relleno Capilar',
        't'                 => 'Temperatura',
        'p'                 => 'Peso',
        'lcf'               => 'Latidos Cardíacos Fetales',
        'eva'               => 'Escala EVA (0-10)',
        'co2'               => 'CO₂ (mmHg) (0-100)',
        'registered_at'     => 'Fecha y Hora de Registro',

    ];
}
