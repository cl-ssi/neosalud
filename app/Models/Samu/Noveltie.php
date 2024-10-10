<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\User;
use App\Models\Samu\Shift;

class Noveltie extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    
    protected $table="samu_novelties";

    protected $fillable = [
        'telephone',
        'detail',
        'type',
        'shift_id'
    ];

    public function shift()
    {
        return $this->BelongsTo(Shift::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'creator_id');
    }

    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function booted()
    {
        /* Asigna el creador */
        self::creating(function (Noveltie $noveltie): void {
            $noveltie->creator()->associate(auth()->user());
        });
    }
}
