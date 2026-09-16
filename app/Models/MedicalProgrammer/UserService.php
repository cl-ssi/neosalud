<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class UserService extends Model implements Auditable
{
  use \OwenIt\Auditing\Auditable;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'service_id', 'user_id', 'principal'
  ];

  public function users() {
      // return $this->hasMany('App\User');
      return $this->belongsTo('App\User','user_id');
  }

  public function services() {
      return $this->hasMany('App\Models\MedicalProgrammer\Service');
  }

  public function service() {
      return $this->belongsTo('App\Models\MedicalProgrammer\Service');
  }

  use SoftDeletes;
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
  protected $table = 'mp_user_services';
  // NOT IN BBDD
}
