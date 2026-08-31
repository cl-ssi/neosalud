<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
  use HasFactory;
  use SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id_minsal',
    'name'
  ];


  /**
   * The casted attributes.
   *
   * @var array
   */
  protected $casts = [
    'deleted_at' => 'datetime'
  ];

  public function communes()
  {
      return $this->hasMany(Commune::class);
  }
}


