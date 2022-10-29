<?php

namespace App\Http\Livewire\Samu\Monitor;

use App\Models\Samu\Event;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class MonitorIndex extends Component
{
    public function render()
    {
        return view('livewire.samu.monitor.monitor-index');
    }

    public function mount()
    {
        $this->getStadistic();
    }

    public function getStadistic()
    {
        $patientsWithRun = Event::whereNotNull('patient_identification')->wherePatientIdentifierTypeId(1)->count();
        $patientsWithRunFixed = Event::wherePatientIdentifierTypeId(1)->whereRunFixed(1)->whereNotNull('verified_fonasa_at')->count();
        $patientsWithRunNoFixed = Event::wherePatientIdentifierTypeId(1)->whereRunFixed(0)->count();
        $patientsWithRunQueue = Event::wherePatientIdentifierTypeId(1)->whereRunFixed(1)->whereNull('verified_fonasa_at')->count();

        $this->patientsWithRun = $patientsWithRun;
        $this->patientsWithRunFixed = $patientsWithRunFixed;
        $this->patientsWithRunNoFixed = $patientsWithRunNoFixed;
        $this->patientsWithRunQueue = $patientsWithRunQueue;
        $this->patientsProcessed = $patientsWithRunFixed + $patientsWithRunNoFixed + $patientsWithRunQueue;
    }

    public function addToQueue()
    {
        Artisan::call('patient:fix');
        $this->getStadistic();
        session()->flash("success", "Fueron enviados 100 pacientes para procesar");
    }
}
