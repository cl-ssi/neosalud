<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identifier extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'use',
        'cod_con_identifier_type_id',
        'system',
        'value',
        'dv',
        'period_id',
        'practitioner_id',
        'organization_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
