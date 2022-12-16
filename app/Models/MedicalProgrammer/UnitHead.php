<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class UnitHead extends Model implements Auditable 
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'id', 'user_id', 'specialty_id', 'profession_id'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function profession(){
        return $this->belongsTo('App\Models\MedicalProgrammer\Profession');
    }

    public function specialty() {
        return $this->belongsTo('App\Models\MedicalProgrammer\Specialty');
    }

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
    protected $table = 'mp_unit_heads';
}
