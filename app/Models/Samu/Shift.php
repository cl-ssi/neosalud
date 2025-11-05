<?php

namespace App\Models\Samu;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Samu\Mobile;
use App\Models\Samu\Noveltie;
use App\Models\Samu\MobileInService;
use App\Models\Samu\ShiftUser;

class Shift extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;

    protected $table = "samu_shifts";

    protected $fillable = [
        'id',
        'status',
        'type',
        'opening_at',
        'closing_at',
        'observation'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'opening_at',
        'closing_at'
    ];

    /**
     * The users that belong to the shift.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'samu_shift_user', 'shift_id')
            ->using(ShiftUser::class)
            ->withPivot('id', 'shift_id', 'job_type_id', 'assumes_at', 'leaves_at')
            ->withTimestamps();
    }

    public function novelties()
    {
        return $this->hasMany(Noveltie::class);
    }

    public function mobilesInService()
    {
        return $this->hasMany(MobileInService::class);

        // return $this->belongsToMany(Mobile::class,'samu_mobiles_in_service')
        //             ->using(MobileInService::class)
        //             ->withPivot('id','observation')
        //             ->withTimestamps();
    }

    // public function mobiles()
    // {
    //     // return $this->hasManyThrough(Mobile::class, MobileInService::class, 'mobile_id', 'shift_id', null, null); // error
    //     return $this->hasManyThrough(Mobile::class, MobileInService::class, 'mobile_id', null, 'shift_id', null); // not error
    //     // return $this->hasManyThrough(Mobile::class, MobileInService::class, 'mobile_id', null, null, 'shift_id'); // error
    //     // return $this->hasManyThrough(Mobile::class, MobileInService::class, 'shift_id', 'mobile_id', null, null); // error
    //     // return $this->hasManyThrough(Mobile::class, MobileInService::class, 'shift_id', null, 'mobile_id', null); // not error
    //     // return $this->hasManyThrough(Mobile::class, MobileInService::class, 'shift_id', null, null, 'mobile_id');// error
    // }

    public function calls()
    {
        return $this->hasMany(Call::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function isOpening()
    {
        return $this->status == 1;
    }

    public function isClosing()
    {
        return $this->status == 0;
    }

    /* Obtiene el estado en palabra */
    public function getStatusInWordAttribute()
    {
        return $this->status == 1 ? 'Abierto' : 'Cerrado';
    }

    public function getOpeningAtFormatAttribute()
    {
        $opening = '-';
        if ($this->opening_at)
            $opening = $this->opening_at->format('Y-m-d H:i');
        return $opening;
    }

    public function getClosingAtFormatAttribute()
    {
        $closing = '-';
        if ($this->closing_at)
            $closing = $this->closing_at->format('Y-m-d H:i');
        return $closing;
    }

    public static function todayShiftVerify()
    {
        return Shift::where('status', true)->exists() ?? false;
    }

    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function booted()
    {
        /* Asigna el creador */
        self::creating(function (Shift $shift): void {
            $shift->creator()->associate(auth()->user());
        });
    }
}
