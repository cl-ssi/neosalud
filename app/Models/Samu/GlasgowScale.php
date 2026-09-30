<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlasgowScale extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'id','age_range','type','name','value'
    ];

    /**
    * The casted attributes.
    *
    * @var array
    */
    // protected $casts = [
    //     'valid_from' => 'datetime',
    //     'valid_to' => 'datetime'
    // ];

    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $table = 'samu_glasgow_scales';
}
