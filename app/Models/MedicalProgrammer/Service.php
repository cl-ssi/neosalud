<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Service extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'service_code',
        'service_name',
        'color'
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\MedicalProgrammer\User', 'mp_user_services')
            ->wherePivot('deleted_at', null);
    }

    public function contracts()
    {
        return $this->hasMany('App\Models\MedicalProgrammer\Contract');
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
    protected $table = 'mp_services';
    // NOT IN BBDD
}
