<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class UserProfession extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'profession_id', 'principal'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    // public function professions()
    // {
    //     return $this->hasMany('App\Models\MedicalProgrammer\Profession');
    // }

    public function professions()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\Profession');
    }

    public function profession()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\Profession');
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
    protected $table = 'mp_user_professions';
    // NOT IN BBDD
}
