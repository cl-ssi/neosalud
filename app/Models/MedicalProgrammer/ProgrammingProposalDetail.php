<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class ProgrammingProposalDetail extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'id','programming_proposal_id','activity_id','sub_activity_id','day','start_hour','end_hour'
    ];

    use HasFactory;
    use SoftDeletes;

    public function programmingProposal()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\ProgrammingProposal');
    }

    public function activity()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\Activity');
    }

    public function subactivity()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\SubActivity','sub_activity_id');
    }

    public function getDayAttribbute(){
      if ($this->day == 1) {
        return "Lunes";
      }
      if ($this->day == 2) {
        return "Martes";
      }
      if ($this->day == 3) {
        return "Miércoles";
      }
      if ($this->day == 4) {
        return "Jueves";
      }
      if ($this->day == 5) {
        return "Viernes";
      }
      if ($this->day == 6) {
        return "Sábado";
      }
      if ($this->day == 7) {
        return "Domingo";
      }
    }

    public function appointments()
    {
      return $this->hasMany('App\Models\Some\Appointment','mp_prog_prop_detail_id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['start_hour','end_hour','deleted_at'];

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'mp_programming_proposals_detail';
}
