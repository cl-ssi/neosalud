<?php

namespace App\Models\Some;

use App\Models\Location;
use App\Models\Practitioner;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['status', 'patient_instruction', 'sent_to_hetg_at'];

    public function appointment_type_text()
    {
        if ($this->cod_con_appointment_type_id == 1) {
            return "Chequeo";
        }
        if ($this->cod_con_appointment_type_id == 2) {
            return "Emergencia";
        }
        if ($this->cod_con_appointment_type_id == 3) {
            return "Seguimiento";
        }
        if ($this->cod_con_appointment_type_id == 4) {
            return "Rutina";
        }
        if ($this->cod_con_appointment_type_id == 5) {
            return "Ingreso";
        }
        if ($this->cod_con_appointment_type_id == 6) {
            return "Sobrecupo";
        }
    }

    public function status_text()
    {
        if ($this->status == "proposed") {
            return "Propuesto";
        }
        if ($this->status == "pending") {
            return "Pendiente";
        }
        if ($this->status == "booked") {
            return "Agendado";
        }
        if ($this->status == "arrived") {
            return "Llegado";
        }
        if ($this->status == "fulfilled") {
            return "Cumplido";
        }
        if ($this->status == "cancelled") {
            return "Cancelado";
        }
        if ($this->status == "noshow") {
            return "No presentado";
        }
        if ($this->status == "entered-in-error") {
            return "Ingresado por error";
        }
        if ($this->status == "checked-in") {
            return "Registrado";
        }
        if ($this->status == "waitlist") {
            return "Lista de espera";
        }
    }


    // public function theoreticalProgramming()
    // {
    //     return $this->belongsTo('App\Models\MedicalProgrammer\TheoreticalProgramming', 'mp_theoretical_programming_id');
    // }

    public function programmingProposalDetail()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\ProgrammingProposalDetail', 'mp_prog_prop_detail_id');
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'appointable')->withTimestamps()->withPivot('type', 'required', 'status', 'period_from', 'period_to');
    }

    public function practitioners()
    {
        return $this->morphedByMany(Practitioner::class, 'appointable')->withTimestamps()->withPivot('type', 'required', 'status', 'period_from', 'period_to');
    }

    public function locations()
    {
        return $this->morphedByMany(Location::class, 'appointable')->withTimestamps()->withPivot('type', 'required', 'status', 'period_from', 'period_to');
    }

    public function appointables()
    {
        return $this->hasMany('App\Models\Appointable', 'appointment_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\CodConAppointmentType', 'cod_con_appointment_type_id');
    }

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime'
    ];
    protected $table = 'appointments';
}
