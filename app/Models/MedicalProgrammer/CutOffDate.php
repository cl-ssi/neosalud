<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class CutOffDate extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mp_cutoff_dates';
    // NOT IN BBDD

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'date', 'observation'
        //, 'user_id'
    ];

    /**
     * The casted attributes.
     *
     * @var array
     */
    protected $casts = ['deleted_at' => 'datetime'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }




    
}
