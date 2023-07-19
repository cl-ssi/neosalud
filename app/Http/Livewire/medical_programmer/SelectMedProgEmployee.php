<?php

namespace App\Http\Livewire\medical_programmer;

use Livewire\Component;
use App\Models\MedicalProgrammer\Specialty;
use App\Models\MedicalProgrammer\Profession;
use App\Models\MedicalProgrammer\Contract;
use App\Models\Practitioner;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicalProgrammer\UnitHead;

class SelectMedProgEmployee extends Component
{
    // public $request;
    public $type;
    public $specialties;
    public $professions;
    public $specialty_id;
    public $profession_id;
    public $users;
    public $user_id;

    public $contract_enable;
    public $contracts;
    public $required_enabled;

    public function render()
    {
        $this->specialties = null;
        $this->professions = null;
        $this->users = null;
        $this->contracts = null;

        if ($this->type != null) {
          if ($this->type == "Médico") {
            if(Auth::user()->hasPermissionTo('Mp: perfil administrador')){
                $this->specialties = Specialty::orderBy('specialty_name','ASC')->get();
            }else{
                $unitHeads_specialty = UnitHead::where('user_id',Auth::id())->pluck('specialty_id');
                $this->specialties = Specialty::whereIn('id',$unitHeads_specialty)->orderBy('specialty_name','ASC')->get();
            }
            
          }else{
            if(Auth::user()->hasPermissionTo('Mp: perfil administrador')){
                $this->professions = Profession::orderBy('profession_name','ASC')->get();
            }else{
                $unitHeads_profession = UnitHead::where('user_id',Auth::id())->pluck('profession_id');
                $this->professions = Profession::whereIn('id',$unitHeads_profession)->orderBy('profession_name','ASC')->get();
            }
          }
        }

        if ($this->specialty_id != null) {
          // $this->users = User::whereHas('userSpecialties', function ($query)  {
          //                         return $query->where('specialty_id',$this->specialty_id);
          //                      })->get();
          $this->users = Practitioner::where('specialty_id',$this->specialty_id)
                                    ->whereHas('user')
                                    ->whereIn('organization_id', auth()->user()->practitionersOrganizations())
                                    ->get()
                                    ->pluck('user');
        }

        if ($this->profession_id != null) {
          // $this->users = User::whereHas('userProfessions', function ($query)  {
          //                         return $query->where('profession_id',$this->profession_id);
          //                      })->get();
          $this->users = Practitioner::where('profession_id',$this->profession_id)
                                    ->whereHas('user')
                                    ->whereIn('organization_id', auth()->user()->practitionersOrganizations())
                                    ->get()
                                    ->pluck('user');
        }

        if ($this->contract_enable != null) {
          if ($this->user_id != null) {
            $this->contracts = Contract::where('user_id',$this->user_id)->get();
          }
        }


        return view('livewire.medical_programmer.select-med-prog-employee');
    }
}
