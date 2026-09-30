<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Profession extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'id_profession',
        'profession_name',
        'color'
        //, 'user_id'
    ];

    public function unscheduled_programmings()
    {
        return $this->hasMany('App\Models\MedicalProgrammer\UnscheduledProgramming');
    }

    public function calendarProgrammings()
    {
        return $this->hasMany('App\Models\MedicalProgrammer\CalendarProgramming');
    }

    public function userProfessions()
    {
        return $this->hasMany('App\Models\MedicalProgrammer\UserProfession');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\MedicalProgrammer\User', 'mp_user_professions')
            ->wherePivot('deleted_at', null);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function activities()
    {
        return $this->belongsToMany('App\Models\MedicalProgrammer\Activity', 'mp_profession_activities')
            ->wherePivot('deleted_at', null)
            ->withPivot('performance');
    }

    public function operating_rooms()
    {
        return $this->belongsToMany('App\Models\MedicalProgrammer\OperatingRoom', 'mp_operating_room_professions')
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
    protected $table = 'mp_professions';
    // NOT IN BBDD    
}
