<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class UserSpecialty extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'specialty_id', 'principal'
    ];

    public function users() {
        // return $this->hasMany('App\User');
        return $this->belongsTo('App\User','user_id');
    }

    public function specialties() {
        return $this->hasMany('App\Models\MedicalProgrammer\Specialty');
    }

    public function specialty() {
        return $this->belongsTo('App\Models\MedicalProgrammer\Specialty');
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
    protected $table = 'mp_user_specialties';
    // NOT IN BBDD
}
