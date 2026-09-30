<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Organization;

class VisatorUser extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'establishment_id',
        'permission'
    ];

    use SoftDeletes;

    public function establishment()
    {
        return $this->belongsTo(Organization::class, 'establishment_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

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
    protected $table = 'mp_visator_users';
    // NOT IN BBDD
}
