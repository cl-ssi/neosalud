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
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $table = 'samu_alterations';
}
