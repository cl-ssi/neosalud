<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
// use OwenIt\Auditing\Contracts\Auditable;

use App\Models\Samu\Shift;
use App\Models\User;
use App\Models\Samu\JobType;
use Illuminate\Database\Eloquent\Relations\Pivot;


class ShiftUser extends pivot
{
    // use \OwenIt\Auditing\Auditable;
    use HasFactory;
    // use SoftDeletes;

    protected $table = "samu_shift_user";

    protected $fillable = [
        'id',
        'shift_id',
        'user_id',
        'job_type_id',
        'assumes_at',
        'leaves_at',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = [
        'assumes_at',
        'leaves_at'
    ];

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobType()
    {
        return $this->belongsTo(JobType::class);
    }
}
