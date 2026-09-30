<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class ProgrammingProposalSignatureFlow extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'id','programming_proposal_id','user_id','type','sign_position','signature_date','status','observation'
    ];

    use HasFactory;
    use SoftDeletes;

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    // public function getStatusTextAttribute(){
    //   if ($this->status == 1) {
    //     return "Aceptado";
    //   }
    //   if ($this->status == 2) {
    //     return "Rechazado";
    //   }
    // }

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

    protected $table = 'mp_programming_proposals_signature_flow';
    // NOT IN BBDD
}
