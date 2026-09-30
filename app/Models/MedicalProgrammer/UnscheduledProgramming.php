<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class UnscheduledProgramming extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'contract_id',
        // 'rut',
        'user_id',
        'specialty_id', 'profession_id',  'activity_id', 'assigned_hour', 'hour_performance', 'year'
        //, 'user_id'
    ];

    // public function rrhh() {
    //     return $this->belongsTo('App\Models\MedicalProgrammer\Rrhh', 'rut');
    // }

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function contract() {
        return $this->belongsTo('App\Models\MedicalProgrammer\Contract');
    }

    public function activity() {
        return $this->belongsTo('App\Models\MedicalProgrammer\Activity');
    }

    public function specialty() {
        return $this->belongsTo('App\Models\MedicalProgrammer\Specialty');
    }

    public function profession() {
        return $this->belongsTo('App\Models\MedicalProgrammer\Profession');
    }

    // public function user() {
    //     return $this->belongsTo('App\User');
    // }

    // public function calendarProgrammings() {
    //     return $this->hasMany('App\Models\MedicalProgrammer\CalendarProgramming');
    // }

    use SoftDeletes;
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
    protected $table = 'mp_unscheduled_programming';
    // NOT IN BBDD
}
