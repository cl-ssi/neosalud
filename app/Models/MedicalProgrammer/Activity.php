<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Activity extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mp_activities';
    // NOT IN BBDD

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'process_id',
        'id_activity',
        'mother_activity_id',
        'activity_type_id',
        'activity_name',
        'description',
        'performance',
        'programmable'
        //, 'user_id'
    ];

    /**
     * The casted attributes.
     *
     * @var array
     */
    protected $casts = [
        'deleted_at' => 'datetime'
    ];



    public function unscheduled_programmings()
    {
        return $this->hasMany('App\Models\MedicalProgrammer\UnscheduledProgramming');
    }

    public function theoretialProgrammings()
    {
        return $this->hasMany('App\Models\MedicalProgrammer\TheoreticalProgramming');
    }

    public function process()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\Process');
    }

    public function motherActivity()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\MotherActivity');
    }

    public function activityType()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\ActivityType');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function specialties()
    {
        return $this->belongsToMany('App\Models\MedicalProgrammer\Specialty', 'mp_specialty_activities')
            ->wherePivot('deleted_at', null)
            ->withPivot('performance');
    }

    public function professions()
    {
        return $this->belongsToMany('App\Models\MedicalProgrammer\Profession', 'mp_profession_activities')
            ->wherePivot('deleted_at', null)
            ->withPivot('performance');
    }

    public function subactivities()
    {
        return $this->hasMany('App\Models\MedicalProgrammer\SubActivity');
    }
}
