<?php

namespace App\Models\RRHH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //para softdelte

class MedicalLicence extends Model
{
    use HasFactory;
    use SoftDeletes;//para softdelte

    // NOT IN BBDD
    
    protected $fillable = [
        "fecha_inicio_reposo","n_dias","tipo_licencia","tipo_reposo","lugar_reposo","reposo_parcial"
    ]; //todas las consultas que  deban ser cargadas en un formulario

    protected $casts = [
        'fecha_inicio_reposo' => 'datetime',
        'deleted_at' => 'datetime',
    ];//el atributo fecha de aca para adelante ,//para softdelte

    
}

