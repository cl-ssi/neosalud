<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class TheoreticalProgramming extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'contract_id',
        // 'rut',
        'user_id', 'specialty_id', 'activity_id', 'sub_activity_id', 'profession_id', 'start_date','end_date',
        // 'week_day', 'start_time', 'end_time',
        'performance', 'year', 'contract_day_type'
    ];

    // protected $casts = [
    //     'start_time' => 'date:hh:mm',
    //     'end_time' => 'date:hh:mm'
    // ];

    // public function rrhh()
    // {
    //     return $this->belongsTo('App\Models\MedicalProgrammer\Rrhh', 'rut');
    // }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function contract()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\Contract');
    }

    public function specialty()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\Specialty');
    }

    public function activity()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\Activity');
    }

    public function subactivity()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\SubActivity','sub_activity_id');
    }

    public function profession()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\Profession');
    }

    public function appointments()
    {
        return $this->hasMany('App\Models\Some\Appointment','mp_theoretical_programming_id');
    }

    // public function user()
    // {
    //     return $this->belongsTo('App\User');
    // }

    /**
     * The casted attributes.
     *
     * @var array
     */
    protected $casts = ['deleted_at' => 'datetime'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mp_theoretical_programming';
    // NOT IN BBDD
}
