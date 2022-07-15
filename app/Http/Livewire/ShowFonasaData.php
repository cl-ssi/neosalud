<?php

namespace App\Http\Livewire;

use App\Models\CodConIdentifierType;
use App\Traits\FonasaTrait;
use Illuminate\Http\Request;

use Livewire\Component;

class ShowFonasaData extends Component
{
    use FonasaTrait;

    public $run;
    public $dv;

    public $identifierType;
    public $patientIdentification;
    public $fullName;

    /* Para editar y precargar los select */
    public $identifierTypeSelected = null;
    public $runSelected = null;
    public $dvSelected = null;

    /* Variables para el Json de intregración */
    public $url;

    /* Variables para el manejo del Form. */
    public $runInput = 'disabled';
    public $patientIdentificationInput = 'readonly';
    public $patientIdentificationInputVisible = '';
    public $fullNameInput = 'readonly';

    /* Objeto */

    public $event;

    public function fonasa_search()
    {
        $url = $this->fonasa($this->run, $this->dv);
        if ($this->run != NULL) {
            $this->fullName = json_decode($url)->name." ".json_decode($url)->fathers_family." ".json_decode($url)->mothers_family;
            $this->patientIdentification = $this->run."-".$this->dv;
            $this->patientIdentificationInputVisible = 'hidden';
        }
    }

    public function mount(){
        // dd($this->event);
        if($this->event){
            $this->identifierType = $this->event->patient_identifier_type_id;
            if($this->identifierType == 1){
                $this->runInput = '';
                $this->run = substr($this->event->patient_identification, 0, -2);
                $this->dv = substr($this->event->patient_identification, -1, 1);
                $this->fullName = $this->event->patient_name;

                $this->patientIdentification = $this->run."-".$this->dv;
                $this->patientIdentificationInputVisible = 'hidden';
            }
            else if($this->identifierType == ""){
                $this->runInput = 'disabled';
                $this->run = NULL;

                $this->patientIdentification = NULL;
                $this->patientIdentificationInput = 'readonly';
                $this->patientIdentificationInputVisible = '';

                $this->fullName = NULL;
                $this->fullNameInput = 'readonly';
            }
            else{
                $this->runInput = 'disabled';
                $this->run = NULL;

                $this->patientIdentificationInput = '';
                $this->patientIdentificationInputVisible = '';
                $this->patientIdentification = $this->event->patient_identification;

                $this->fullNameInput = '';
                $this->fullName = $this->event->patient_name;
            }
        }
    }

    public function render()
    {
        $run = intval($this->run);
        $s=1;
        for($m=0;$run!=0;$run/=10)
            $s=($s+$run%10*(9-$m++%6))%11;
        $this->dv = chr($s?$s+47:75);

        return view('livewire.show-fonasa-data', [
          'identifierTypes' => CodConIdentifierType::pluck('id','text')->sort(),
          'fullName' => $this->fullName
        ]);
    }

    public function updatedidentifierType($identifier_type_id){
        if ($identifier_type_id == 1){
            $this->runInput = '';

            $this->patientIdentification = NULL;
            $this->patientIdentificationInput = 'readonly';

            $this->fullName = NULL;
            $this->fullNameInput = 'readonly';
        }
        else if($identifier_type_id == ""){
            $this->runInput = 'disabled';
            $this->run = NULL;

            $this->patientIdentification = NULL;
            $this->patientIdentificationInput = 'readonly';
            $this->patientIdentificationInputVisible = '';

            $this->fullName = NULL;
            $this->fullNameInput = 'readonly';
        }
        else{
            $this->runInput = 'disabled';
            $this->run = NULL;

            $this->patientIdentificationInput = '';
            $this->patientIdentificationInputVisible = '';
            $this->patientIdentification = NULL;

            $this->fullNameInput = '';
            $this->fullName = NULL;
        }
    }
}
