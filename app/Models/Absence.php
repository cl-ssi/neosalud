<?php

namespace App\Models;

use App\Models\MedicalProgrammer\Contract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Absence extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'contract_id',
        'practitioner_id',
        'health_insurance',
        'social_insurance',
        'legal_quality',
        'staff',
        'res_number',
        'res_date',
        'start_date',
        'end_date',
        'total_days',
        'period_days',
        'license_cost',
        'type',
        'balance_days_not_replaced',
        'load_source',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'res_date' => 'date',
        'start_date' => 'date',
        'end_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }

    public function practitioner()
    {
        return $this->belongsTo(Practitioner::class, 'practitioner_id');
    }
}
