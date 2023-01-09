<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProgrammingProposal extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'id','type','user_id','contract_id','specialty_id','profession_id','request_date','start_date','end_date','status','observation'
    ];

    use HasFactory;
    use SoftDeletes;

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function details() {
        return $this->hasMany('App\Models\MedicalProgrammer\ProgrammingProposalDetail','programming_proposal_id');
    }

    public function signatureFlows() {
        return $this->hasMany('App\Models\MedicalProgrammer\ProgrammingProposalSignatureFlow','programming_proposal_id');
    }

    public function contract()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\Contract');
    }

    public function specialty()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\Specialty');
    }

    public function profession()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\Profession');
    }


    public function employeeCanModify(ProgrammingProposal $programmingProposal)
    {
        
        //si la solicitud ya fue confirmada, no se deja modificar a nadie
        if ($this->status == "Confirmado") {
            return 0;
        }
        else
        {
            // Si es administrador, se deja modificar
            if (Auth::user()->hasPermissionTo('Mp: administrador')) {
                return 1;
            }

            //cuando esta asignado como visador, retonar 0
            if(Auth::user()->programmerVisator->count() > 0){
                return 0;
            }

            // //Se verifica que visador este autorizado para el establecimiento al cual fué asignado el contrato de la ficha.
            // if(Auth::user()->programmerVisator->where('establishment_id',$programmingProposal->contract->establishment_id)->count() > 0){
            //     return 1;
            // }

            //si no es visador, verificar si está asignado como jefe de unidad
            // else{

            // si es jefe de unidad    
            if($programmingProposal->specialty_id!=null){
                if(Auth::user()->unitHead->where('specialty_id',$programmingProposal->specialty_id)->count() > 0){
                    return 1;
                }else{
                    return 0;
                }
            }
            if($programmingProposal->profession_id!=null){
                if(Auth::user()->unitHead->where('profession_id',$programmingProposal->profession_id)->count() > 0){
                    return 1;
                }else{
                    return 0;
                }
            }
            // }
        }


    //   //si la solicitud ya fue confirmada, no se deja modificar a nadie
    //   if ($this->status == "Confirmado") {
    //     return 0;
    //   }
    //   else
    //   {
    //     // si tiene permisos de supervición
    //     // if (
    //     //     Auth::user()->hasPermissionTo('Mp: asigna tu equipo') ||
    //     //     Auth::user()->hasPermissionTo('Mp: Proposal - Jefe de CAE Médico') ||
    //     //     Auth::user()->hasPermissionTo('Mp: Proposal - Jefe de CAE No médico') ||
    //     //     Auth::user()->hasPermissionTo('Mp: Proposal - Subdirección Médica') ||
    //     //     Auth::user()->hasPermissionTo('Mp: Proposal - Subdirección DGCP')
    //     //     ) {
    //     //   // si solicitud solo está creada, no se deja confirmar a visadores
    //     //   if ($this->signatureFlows->last()->status == "Solicitud creada" && $this->signatureFlows->last()->type == "Funcionario") {
    //     //   // if ($this->signatureFlows->last()->status == "Solicitud creada" && $this->signatureFlows->last()->user_id == Auth::id()) {
    //     //     return 0;
    //     //   }else{
    //     //     return 1;
    //     //   }
    //     // }
        
    //     if (Auth::user()->programmerVisator->count() > 0) {
    //       // si solicitud solo está creada, no se deja confirmar a visadores
    //       if ($this->signatureFlows->last()->status == "Solicitud creada" && $this->signatureFlows->last()->type == "Jefe de Servicio") {
    //       // if ($this->signatureFlows->last()->status == "Solicitud creada" && $this->signatureFlows->last()->user_id == Auth::id()) {
    //         return 0;
    //       }else{
    //         return 1;
    //       }
    //     }
    //     else
    //     {
    //         if (Auth::user()->unitHead->count() > 0) {
    //             // si solicitud esta creada, se puede modificar, si esta confirmada, no se deja modificar
    //             if ($this->signatureFlows->last()->status == "Solicitud creada") {
    //                 return 1;
    //             }else{
    //                 return 0;
    //             }
    //         } 
    //     }
        
    //   }
    }

    // public function scopeHasUnopenedDetailsBetween($query, $from, $to){
    //     $notOpenedDetailIds = [];
    //     foreach ($query->get() as $key => $programmingProposal) {
    //         // Obtener rango de fechas a recorrer
    //         $start_date = ($from > $programmingProposal->start_date) ? Carbon::parse($from) : $programmingProposal->start_date;
    //         $end_date = ($to < $programmingProposal->end_date) ? Carbon::parse($to) : $programmingProposal->end_date;

    //         // se eliminan antiguos del array (periodos anteriores del ciclo) que se encuentren between de nueva iteración
    //         // foreach ($programmed_days as $key => $programmed_day) {
    //         //     if (Carbon::parse($programmed_day['start_date'])->between($start_date, $end_date)) {
    //         //         unset($programmed_days[$key]);
    //         //     }
    //         // }

    //         // se obtienen los del periodo actual
    //         while ($start_date <= $end_date) {
    //             $dayOfWeek = $start_date->dayOfWeek;
    //             foreach ($programmingProposal->details->where('day', $dayOfWeek) as $key2 => $detail) {
    //                 //que tengan performance
    //                 if ($detail->activity->performance != 0) {
    //                     // verifica si está aperturado o no
    //                     $start = Carbon::parse($start_date->format('Y-m-d') . " " . $detail->start_hour);
    //                     if ($detail->appointments->where('start', $start)->count() == 0) {
    //                         array_push($notOpenedDetailIds, $detail->id);
    //                     }
    //                 }
    //             }
    //             $start_date->addDays(1);
    //         }
    //     }

    //      ProgrammingProposal::query()
    //       ->whereHas('details', function($q) use($notOpenedDetailIds){
    //         $q->whereIn('id', $notOpenedDetailIds);
    //       });

    //       // $programmingProposaldebug = ProgrammingProposal::query()
    //       // ->whereHas('details', function($q) use($notOpenedDetailIds){
    //       //   $q->whereIn('id', $notOpenedDetailIds);
    //       // });

    //       // \Debugbar::info($programmingProposaldebug->get());
    // }

    public function countUnopenedDetailsBetween($from, $to){
        $count = 0;
        // Obtener rango de fechas a recorrer
        $start_date = ($from > $this->start_date) ? Carbon::parse($from) : $this->start_date;
        $end_date = ($to < $this->end_date) ? Carbon::parse($to) : $this->end_date;

        // se eliminan antiguos del array (periodos anteriores del ciclo) que se encuentren between de nueva iteración
        // foreach ($programmed_days as $key => $programmed_day) {
        //     if (Carbon::parse($programmed_day['start_date'])->between($start_date, $end_date)) {
        //         unset($programmed_days[$key]);
        //     }
        // }

        // se obtienen los del periodo actual
        while ($start_date <= $end_date) {
            $dayOfWeek = $start_date->dayOfWeek;
            foreach ($this->details->where('day', $dayOfWeek) as $key2 => $detail) {
                //que tengan performance
                if ($detail->activity->performance != 0) {
                    // verifica si está aperturado o no
                    $start = Carbon::parse($start_date->format('Y-m-d') . " " . $detail->start_hour);
                    if ($detail->appointments->where('start', $start)->count() == 0) {
                      $count++;
                    }
                }
            }
            $start_date->addDays(1);
        }

        return $count;
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['request_date', 'start_date', 'end_date', 'deleted_at'];

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'mp_programming_proposals';
}
