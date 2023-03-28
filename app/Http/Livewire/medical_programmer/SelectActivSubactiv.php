<?php

namespace App\Http\Livewire\medical_programmer;

use Livewire\Component;

// use App\Models\MedicalProgrammer\Process;
// use App\Models\MedicalProgrammer\MotherActivity;
use App\Models\MedicalProgrammer\SpecialtyActivity;
use App\Models\MedicalProgrammer\ProfessionActivity;
use App\Models\MedicalProgrammer\SubActivity;

class SelectActivSubactiv extends Component
{
    public $specialty_id;
    public $profession_id;

    // public $process_id;
    // public $processes;
    // public $motherActivities;
    public $specialtyActivities;
    public $professionActivities;
    public $subactivities;
    public $activity_id;

    public function mount(){

        // $this->processes = Process::all();
        // $this->motherActivities = MotherActivity::all();

        if ($this->specialty_id != null) {
            $this->specialtyActivities = SpecialtyActivity::where('specialty_id',$this->specialty_id)->get();
        }
        if ($this->profession_id != null) {
            $this->professionActivities = ProfessionActivity::where('profession_id',$this->profession_id)->get();
        }
    }

    public function render()
    {
        if ($this->activity_id != null) {
          if ($this->specialty_id != null) {
            $this->subactivities = SubActivity::where('activity_id',$this->activity_id)
                                              ->where('specialty_id',$this->specialty_id)->get();
          }
          if ($this->profession_id != null) {
            $this->subactivities = SubActivity::where('activity_id',$this->activity_id)
                                              ->where('profession_id',$this->profession_id)->get();
          }
        }
        return view('livewire.medical_programmer.select-activ-subactiv');
    }
}
