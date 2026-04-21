<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\User;

class MobileException extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $table = "samu_mobile_exceptions";

    protected $fillable = [
        'id',
        'mobile_in_service_id',
        'exception_type',
        'started_at',
        'ended_at',
        'observation',
        'creator_id',
    ];

    protected $dates = [
        'started_at',
        'ended_at',
    ];

    /**
     * Get the mobile in service that owns this exception.
     */
    public function mobileInService()
    {
        return $this->belongsTo(MobileInService::class);
    }

    /**
     * Get the user who created this exception.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * Get the duration in minutes of this exception.
     */
    public function getDurationMinutesAttribute()
    {
        if ($this->started_at && $this->ended_at) {
            return intval($this->started_at->diffInMinutes($this->ended_at));
        }
        return 0;
    }

    /**
     * Scope: Only exceptions longer than 1 hour (60 minutes).
     */
    public function scopeExceedsOneHour($query)
    {
        return $query->whereRaw('TIMESTAMPDIFF(MINUTE, started_at, ended_at) > 60');
    }

    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function booted()
    {
        /* Asigna el creador */
        self::creating(function (MobileException $exception): void {
            $exception->creator()->associate(auth()->user());
        });
    }
}
