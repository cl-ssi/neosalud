<?php

namespace App\Http\Livewire;

use App\Helpers\Run;
use App\Models\CodConIdentifierType;
use App\Models\Gender;
use App\Models\Samu\Event;
use App\Traits\FonasaTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Livewire\Component;

class ShowFonasaData extends Component
{
    use FonasaTrait;

    /* Variables del formulario */
    public $patient_identifier_type_id = null;
    public $patient_identification = null;
    public $patient_name = null;
    public $gender_id;
    public $prevision;
    public $birthday;
    public $age_year;
    public $age_month;
    public $run_fixed;
    public $verified_fonasa_at;

    /* Variables generadas para el algoritmo */
    public $run = null;
    public $dv = null;
    public $patient_other_identification = null;

    /* Cargar los tipos de identificadores */
    public $identifierType;

    /* Variables para mostrar y ocultar los inputs */
    public $runInput;
    public $otherIdentificationInput;
    public $disabled;

    /* Muestra si hay algún error del ws de fonasa */
    public $error_fonasa = null;

    /* Objeto $event */
    public $event;
    public $genders;
    public $previsions;

    public function mount()
    {
        /* Carga los tipos de identificador */
        $this->getPrevisions();
        $this->identifierTypes = CodConIdentifierType::pluck('id','text')->sort();
        $this->getGenders();

        if($this->event)
        {
            /* Setea todas las variables menos $this->patient_identification que lo hace el render() */
            $this->patient_identifier_type_id = $this->event->patient_identifier_type_id;
            $this->patient_name = $this->event->patient_name;
            $this->patient_other_identification = $this->event->patient_identification;
            $this->prevision = $this->event->prevision;
            $this->gender_id = $this->event->gender_id;
            $this->birthday = $this->event->birthday ? $this->event->birthday->format('Y-m-d') : null;
            $this->age_year = $this->event->age_year ? $this->event->age_year : null;
            $this->age_month = $this->event->age_month ? $this->event->age_month : null;
            $this->verified_fonasa_at = $this->event->verified_fonasa_at;

            if($this->patient_identifier_type_id == 1)
            {
                $patient_identification = str_replace(array('.','-',' ',','), '',$this->event->patient_identification);
                $this->run = substr($patient_identification, 0, -1) ?? null;
                $this->dv = substr($patient_identification, -1, 1) ?? null;
                $this->disabled = true;
            }
        }
    }

    public function fonasa_search()
    {
        $user = $this->fonasa($this->run, $this->dv);
        /* Si el json contiene la palabra error */
        if(str_contains($user, 'Error'))
        {
            $this->error_fonasa = $user;
        }
        else if($user)
        {
            $patient = json_decode($user);
            $this->run_fixed = true;
            $this->verified_fonasa_at = now();
            $this->prevision = $this->addPrevision($patient->prevision);
            $this->birthday = $patient->birthday;
            $this->age_year = $this->getYearOfAge();
            $this->age_month = $this->getMonthOfAge();
            $this->patient_name = "$patient->name $patient->fathers_family $patient->mothers_family";
            $this->gender_id = $this->getGender($patient->gender);
            $this->disabled = true;
            $this->error_fonasa = null;
        }
    }

    public function render()
    {
        switch($this->patient_identifier_type_id)
        {
            case 1:
                if($this->run)
                {
                    $this->dv = Run::getDv($this->run);
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
                $this->verified_fonasa_at = null;
                $this->run_fixed = null;
                $this->patient_identification = $this->patient_other_identification;
                $this->run = substr($this->patient_other_identification, 0, -1) ?? null;
                $this->dv = substr($this->patient_other_identification, -1, 1) ?? null;
                $this->otherIdentificationInput = true;
                $this->runInput = null;
                break;
        }

        return view('livewire.show-fonasa-data');
    }

    public function updatedPatientIdentifierTypeId($patient_identifier_type_id)
    {
        if($patient_identifier_type_id != 1)
        {
            $this->disabled = null;
            $this->gender_id = null;
            $this->prevision = null;
            $this->birthday = null;
            $this->age_year = null;
            $this->age_month = null;
            $this->patient_name = null;
        }
    }

    public function updatedBirthday($birthday)
    {
        $this->age_year = null;
        $this->age_month = null;

        if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $birthday))
        {
            $this->age_year = $this->getYearOfAge();
            $this->age_month = $this->getMonthOfAge();
        }
    }

    public function getGender($gender)
    {
        switch ($gender)
        {
            case 'Masculino':
                $gender_id = 1;
                break;
            case 'Femenino':
                $gender_id = 2;
                break;
            default:
                $gender_id = null;
                break;
        }
        return $gender_id;
    }

    public function getGenders()
    {
        $this->genders = Gender::all();
    }

    public function getPrevisions()
    {
        $this->previsions = Event::query()
            ->whereNotNull('prevision')
            ->groupBy('prevision')
            ->orderBy('prevision')
            ->get('prevision')
            ->pluck('prevision');
    }

    public function getYearOfAge()
    {
        $birthday = Carbon::parse($this->birthday);
        return $birthday->diff(now())->format('%y');
    }

    public function getMonthOfAge()
    {
        $birthday = Carbon::parse($this->birthday);
        return $birthday->diff(now())->format('%m');
    }

    public function addPrevision($prevision)
    {
        if($this->previsions->doesntContain($prevision))
            $this->previsions->push($prevision)->sort();
        return $prevision;
    }
}
