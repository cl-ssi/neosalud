<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MobileType extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name',
        'description',
        'valid_from',
        'valid_to',
        'status'
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = [
        'valid_from',
        'valid_to'
    ];

    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $table = 'samu_mobile_types';

    public function mobiles()
    {
        return $this->hasMany(Mobile::class);
    }

    public function getShortNameAttribute()
    {
        return Str::substr($this->name, 0, 3);
    }
}
