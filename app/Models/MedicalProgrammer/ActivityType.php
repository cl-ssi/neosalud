<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class ActivityType extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mp_activity_types';
    // NOT IN BBDD    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        // 'user_id'
    ];

    /**
     * The casted attributes.
     *
     * @var array
     */
    protected $casts = [
        'deleted_at' => 'datetime'
    ];

    public function activities()
    {
        return $this->hasMany('App\Models\MedicalProgrammer\Activity');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
