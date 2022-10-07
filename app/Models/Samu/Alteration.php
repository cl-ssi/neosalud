<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alteration extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'type','name'
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    // protected $dates = [
    //     'valid_from',
    //     'valid_to'
    // ];

    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $table = 'samu_alterations';
}
