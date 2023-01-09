<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Organization;

class SubActivity extends Model implements Auditable
{
  use \OwenIt\Auditing\Auditable;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'id', 'establishment_id','specialty_id', 'profession_id','activity_id', 'sub_activity_abbreviated', 'sub_activity_name', 'sub_activity_description', 'performance'
  ];

  public function theoretialProgrammings()
  {
      return $this->hasMany('App\Models\MedicalProgrammer\TheoreticalProgramming');
  }

  public function specialty()
  {
      return $this->belongsTo('App\Models\MedicalProgrammer\Specialty');
  }

  public function profession()
  {
      return $this->belongsTo('App\Models\MedicalProgrammer\Profession');
  }

  public function activity()
  {
      return $this->belongsTo('App\Models\MedicalProgrammer\Activity');
  }

    public function establishment()
    {
        return $this->belongsTo(Organization::class, 'establishment_id');
    }

  // public function specialties()
  // {
  //     return $this->belongsToMany('App\Models\MedicalProgrammer\Specialty', 'mp_specialty_activities')
  //         ->wherePivot('deleted_at', null)
  //         ->withPivot('performance');
  // }
  //
  // public function professions()
  // {
  //     return $this->belongsToMany('App\Models\MedicalProgrammer\Profession', 'mp_profession_activities')
  //         ->wherePivot('deleted_at', null)
  //         ->withPivot('performance');
  // }

  use SoftDeletes;
  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'mp_sub_activities';
}
