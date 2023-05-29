<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Organization;

class PatientAdvancedSearch extends Component
{
    public $mode;

    public $searchByHumanName = null;
    public $searchByIdentifier = null;
    public $searchByAddress = null;
    public $searchByContactPoint = null;
    public $patients = null;
    public $organizations;
    public ?Organization $selectedOrganization = null;

    public $confirmOrganization = false;
    public $selectedUserName;
    public ?User $selectedPatient = null;
    public $selectedPatientId;

    public function mount()
    {
        $this->organizations = Organization::whereIn('id', Auth::user()->practitioners->pluck('organization_id'))
            ->orderBy('alias')
            ->get();

        $this->selectedOrganization = new Organization();
    }

    public function search()
    {
        if ($this->searchByHumanName || $this->searchByIdentifier || $this->searchByAddress || $this->searchByContactPoint) {
            $this->patients = User::query()
                ->when($this->searchByHumanName, function ($query) {
                    $query->whereHas('humanNames', function ($query) {
                        $columns = [DB::raw("concat(SUBSTRING_INDEX(text, ' ', 1), ' ', fathers_family)"), 'text', 'fathers_family', 'mothers_family'];
                        $query->where(function ($q) use ($columns) {
                            foreach ($columns as $column)
                                $q->orWhere($column, 'like', "%{$this->searchByHumanName}%");
                        });
                    });
                })
                ->when($this->searchByIdentifier, function ($query) {
                    $query->whereHas('identifiers', function ($query) {
                        $query->where('value', $this->searchByIdentifier);
                    });
                })
                ->when($this->searchByAddress, function ($query) {
                    $query->whereHas('addresses', function ($query) {
                        $columns = [DB::raw("concat(text, ' ', line)"), 'text', 'line', 'apartment'];
                        $query->where(function ($q) use ($columns) {
                            foreach ($columns as $column)
                                $q->orWhere($column, 'like', "%{$this->searchByAddress}%");
                        });
                    });
                })
                ->when($this->searchByContactPoint, function ($query) {
                    $query->whereHas('contactPoints', function ($query) {
                        $query->where('value', 'like', "%{$this->searchByContactPoint}%");
                    });
                })
                ->get();
        }

        $this->selectedUserName = $this->selectedPatientId ? User::find($this->selectedPatientId)->officialFullName : null;
    }

    public function clean()
    {
        $this->reset(['selectedPatientId']);
    }

    public function selectOrganization($organizationId, $patientId)
    {
        $this->confirmOrganization = true;
        $this->selectedOrganization = Organization::find($organizationId);

        // Obtener el paciente seleccionado
        $this->selectedPatientId = $patientId;
        $this->selectedPatient = $this->selectedPatientId ? User::find($this->selectedPatientId) : null;
    }



    public function confirmOrganizationAction()
    {
        // Lógica para realizar la acción de confirmación, como enviar la solicitud de examen de Chagas.
        // Puedes agregar aquí el código necesario para realizar la acción deseada.

        // Después de realizar la acción deseada, puedes restablecer las variables y mostrar un mensaje de éxito.

        // Redireccionar a la nueva ruta con los parámetros del paciente y la organización seleccionada
        return redirect()->route('chagas.confirmRequestChaga', [$this->selectedPatient, $this->selectedOrganization]);


        $this->reset(['confirmOrganization', 'selectedOrganization', 'selectedPatientId']);
        $this->selectedUserName = null;

        
    }


    public function cancelOrganizationAction()
    {
        $this->selectedPatient = null;
        $this->reset(['confirmOrganization', 'selectedOrganization', 'selectedPatientId']);
        $this->selectedUserName = $this->selectedPatientId ? User::find($this->selectedPatientId)->officialFullName : null;
    }

    public function render()
    {
        return view('livewire.patient-advanced-search');
    }
}
