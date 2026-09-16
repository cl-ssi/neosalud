<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class OperatingRoom extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'description', 'location', 'color', 'medic_box'
        //, 'user_id'
    ];

    public function calendarProgrammings() {
        return $this->hasMany('App\Models\MedicalProgrammer\CalendarProgramming');
    }

    public function userOperatingRooms() {
        return $this->hasMany('App\Models\MedicalProgrammer\UserOperatingRoom');
    }

    public function user() {
        return $this->belongsToMany('App\User');
    }

    public function specialties()
    {
        return $this->belongsToMany('App\Models\MedicalProgrammer\Specialty', 'mp_operating_room_specialties')
                    ->wherePivot('deleted_at', null);
                    // ->withPivot('performance');
    }

    public function professions()
    {
        return $this->belongsToMany('App\Models\MedicalProgrammer\Profession', 'mp_operating_room_professions')
                    ->wherePivot('deleted_at', null);
                    // ->withPivot('performance');
    }

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
    protected $table = 'mp_operating_rooms';
    // NOT IN BBDD    
}
