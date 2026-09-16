<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'code',
        'name',
        'valid_from',
        'valid_to',
        'value'
    ];

    /**
    * The casted attributes.
    *
    * @var array
    */
    protected $casts = [
        'valid_from' => 'date',
        'valid_to' => 'date'
    ];

    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $table = 'samu_medicines';
}
