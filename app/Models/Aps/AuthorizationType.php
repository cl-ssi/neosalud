<?php

namespace App\Models\Aps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class AuthorizationType extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'start_date',
        'end_date',
        'status'
    ];

    /**
     * The casted attributes.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'aps_authorizations_types';
}
