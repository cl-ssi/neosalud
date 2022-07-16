<?php

namespace App\Http\Livewire;

use App\Models\CodConIdentifierType;
use App\Traits\FonasaTrait;
use Illuminate\Http\Request;

use Livewire\Component;

class ShowFonasaData extends Component
{
    use FonasaTrait;

    public $patient_identifier_type_id = null;
    public $run = null;
    public $dv = null;
    public $run_dv = null;
    public $patient_identification = null;
    public $patient_other_identification = null;
    public $patient_name = null;

    /* Para cargar los tipos de identificadores */
    public $identifierType;

    /* Variables para el Json de intregración */
    public $url;

    /* Variables mostrar y ocultar los inputs */
    public $runInput;
    public $otherIdentificationInput;
    public $error_fonasa = null;

    /* Objeto */
    public $event;

    public function mount()
    {
        $this->identifierTypes = CodConIdentifierType::pluck('id','text')->sort();

        if($this->event)
        {
            $this->patient_identifier_type_id = $this->event->patient_identifier_type_id;
            $this->patient_name = $this->event->patient_name;
            $this->patient_other_identification = $this->event->patient_identification;

            if($this->patient_identifier_type_id == 1)
            {
                $patient_identification = str_replace(array('.','-',' ',','), '',$this->event->patient_identification);
                $this->run = substr($patient_identification, 0, -1) ?? null;
                $this->dv = substr($patient_identification, -1, 1) ?? null;
            }
        }
    }

    public function fonasa_search()
    {
        $user = $this->fonasa($this->run, $this->dv);
        
        if(str_contains($user, 'Error'))
        {
            $this->error_fonasa = $user;
        }
        else if($user) 
        {
            $this->error_fonasa = null;
            $this->patient_name = 
                json_decode($user)->name . " " .
                json_decode($user)->fathers_family . " " .
                json_decode($user)->mothers_family;
        }
    }

    public function render()
    {
        switch($this->patient_identifier_type_id)
        {
            case 1:
                /** Calculo del dv */
                if($this->run)
                {
                    $run = intval($this->run);
                    $s = 1;
                    for($m=0;$run!=0;$run/=10)
                        $s=($s+$run%10*(9-$m++%6))%11;
                    $this->dv = chr($s?$s+47:75);
                    $this->patient_identification = $this->run.'-'.$this->dv;
                }
                else
                {
                    $this->dv = null;
                    $this->patient_identification = null;
                }
                $this->patient_other_identification = $this->run.$this->dv;
                $this->runInput = true;
                $this->otherIdentificationInput = null;
                break;
            default:
                $this->patient_identification = $this->patient_other_identification;
                $this->run = substr($this->patient_other_identification, 0, -1) ?? null;
                $this->dv = substr($this->patient_other_identification, -1, 1) ?? null;
                $this->otherIdentificationInput = true;
                $this->runInput = null;
                break;
        }

        return view('livewire.show-fonasa-data');
    }
}
