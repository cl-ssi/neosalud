<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class MotherActivity extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'description'
        //, 'user_id'
    ];

    public function activities()
    {
        return $this->hasMany('App\Models\MedicalProgrammer\Activity');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
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
    protected $table = 'mp_mother_activities';
    // NOT IN BBDD
}
