<?php

namespace App\Models\Aps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class MinorAuthorization extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'aps_minor_authorizations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'type_id',
        'run',
        'dv',
        'names',
        'fathers_family',
        'mothers_family',
        'authorization_date',
        'authorized',
        'authorizer_id'
    ];

    /**
     * The casted attributes.
     *
     * @var array
     */
    protected $casts = [
        'authorization_date' => 'date',
        'deleted_at' => 'datetime'
    ];

    public function type()
    {
        return $this->belongsTo('App\Models\Aps\AuthorizationType');
    }

    public function authorizer()
    {
        return $this->belongsTo('App\Models\User', 'authorizer_id');
    }
}
