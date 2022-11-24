<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Organization;

class Contract extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        // 'rut',
        'user_id', 'year', 'law', 'contract_id',  'weekly_hours', 'shift_system',
        'obs', 'legal_holidays', 'compensatory_rest', 'administrative_permit',
        'training_days', 'breastfeeding_time', 'weekly_collation',
        'contract_start_date', 'contract_end_date', 'unit', 'unit_code','service_id',
        //, 'user_id'
        'establishment_id','effective_hours','covid_permit','weekly_union_permit','departure_date'
    ];

    // public function rrhh() {
    //     return $this->belongsTo('App\Models\MedicalProgrammer\Rrhh', 'rut');
    // }

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function unscheduled_programmings() {
        return $this->hasMany('App\Models\MedicalProgrammer\UnscheduledProgramming');
    }

    public function theoretical_programmings() {
        return $this->hasMany('App\Models\MedicalProgrammer\TheoreticalProgramming');
    }

    // public function user() {
    //     return $this->belongsTo('App\User');
    // }

    public function logs() {
        return $this->morphMany('App\Models\MedicalProgrammer\Log','model')->where('diferences','<>',"[]");
    }

    public function service() {
        return $this->belongsTo('App\Models\MedicalProgrammer\Service');
    }

    public function establishment()
    {
       return $this->belongsTo(Organization::class, 'establishment_id');
    }

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
    protected $table = 'mp_contracts';
}
