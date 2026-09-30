<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class ProfessionActivity extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'profession_id','activity_id','performance'
    ];

    use SoftDeletes;

    public function activity()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\Activity');
    }
    
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
    protected $table = 'mp_profession_activities';
    // NOT IN BBDD    
}
