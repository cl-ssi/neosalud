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
    public $fullName = '';

    /* Para editar y precargar los select */
    public $runSelected = null;
    public $dvSelected = null;

    /* Variables para el Json de intregración */
    public $url;

    /* Variables para el manejo del Form. */

    public $runInput = 'disabled';
    public $patientIdentificationInput = 'disabled';
    public $fullNameInput = 'readonly';

    public function fonasa_search()
    {
        $url = $this->fonasa($this->run, $this->dv);
        $this->fullName = json_decode($url)->name." ".json_decode($url)->fathers_family." ".json_decode($url)->mothers_family;

        //dd($this->fullName);
    }

    public function mount(){
        //$this->fullName = json_decode($url)->name." ".json_decode($url)->fathers_family." ".json_decode($url)->mothers_family;
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

            // document.getElementById("for_patient_identification").disabled = true;
            // document.getElementById("for_patient_identification").value = '';
            //
            // document.getElementById("for-patient-full-name").disabled = true;
            // document.getElementById("for-patient-full-name").value = '';
        }
        else if($identifier_type_id == ""){
            $this->runInput = 'disabled';
            $this->run = NULL;
            // document.getElementById("for_patient_identification").disabled = true;
            // document.getElementById("for-patient-full-name").disabled = true;
        }
        else{
            $this->runInput = 'disabled';
            $this->run = NULL;
            // document.getElementById("for_run").disabled = true;
            // document.getElementById("for_fonasa_button").disabled = true;
            //
            // document.getElementById("for_patient_identification").disabled = false;
            // document.getElementById("for_patient_identification").value = '';
            //
            // document.getElementById("for-patient-full-name").disabled = false;
            // document.getElementById("for-patient-full-name").value = '';
        }
        //dd('hola');
    }
}
