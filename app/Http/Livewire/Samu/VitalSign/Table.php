<?php

namespace App\Http\Livewire\Samu\VitalSign;

use Livewire\Component;
use App\Models\Samu\VitalSign;
use App\Http\Requests\VitalSign\VitalSignRequest;
use Illuminate\Support\Facades\Validator;

class Table extends Component
{
    public $event;                    // Evento actual (inyectado desde la vista padre)
    public $vitalSigns;               // Colección de signos vitales del evento
<<<<<<< HEAD
    public $showModal = false;        // Controla visibilidad del modal
    public $isEditMode = false;       // Indica si se está editando o creando
    public $selectedIndex = null;     // Índice del registro seleccionado
=======
    public $vitalSignsId;             // IDs de signos vitales para cargar en el modal
    public $showModal = false;        // Controla visibilidad del modal
    public $isEditMode = false;       // Indica si se está editando o creando
    public $selectedIndex = null; 
        // Índice del registro seleccionado
>>>>>>> e73d7699 (SAMU: Rollback vital signs)
    public $form = [                  // Atributos para el formulario
        'id'             => null,
        'registered_at'  => null,
        'fc'             => null,
        'fr'             => null,
        'pa'             => null,
        'pam'            => null,
        'gl'             => null,
        'soam'           => null,
        'soap'           => null,
        'hgt'            => null,
        'fill_capillary' => null,
        't'              => null,
        'p'              => null,
        'lcf'            => null,
        'eva'            => null,    // Nuevo campo EVA
        'co2'            => null,    // Nuevo campo CO2
    ];

    protected $listeners = ['refreshVitalSigns' => 'loadVitalSigns'];

    public function mount($event)
    {
        if(isset($event)){

            $this->event = $event;        
<<<<<<< HEAD
            $this->loadVitalSigns();
=======
            $this->loadEventVitalSigns();
>>>>>>> e73d7699 (SAMU: Rollback vital signs)
        }
        else{
            $this->event = null;
            $this->vitalSigns = [];
        }
    }

<<<<<<< HEAD
    public function loadVitalSigns()
=======
    public function loadEventVitalSigns()
>>>>>>> e73d7699 (SAMU: Rollback vital signs)
    {
        // Recupera todos los signos vitales asociados al evento
        $this->vitalSigns = VitalSign::where('event_id', $this->event?->id)
                                     ->orderBy('registered_at', 'desc')
                                     ->get()
                                     ->toArray();
    }

<<<<<<< HEAD
=======
    public function loadVitalSigns($vitalSignsId)
    {
        $this->vitalSigns = VitalSign::whereIn('id', $vitalSignsId)
                                     ->orderBy('registered_at', 'desc')
                                     ->get()
                                     ->toArray();
    }

>>>>>>> e73d7699 (SAMU: Rollback vital signs)
    public function openCreateModal()
    {
        // Reiniciar el formulario para crear
        $this->resetForm();
        $this->isEditMode = false;
        $this->showModal = true;
    }

    public function openEditModal($index)
    {
        // Cargar datos del registro seleccionado al formulario
        $this->selectedIndex = $index;
        $record = $this->vitalSigns[$index];
        $this->form = [
            'id'             => $record['id'],
            'registered_at'  => $record['registered_at'],
            'fc'             => $record['fc'],
            'fr'             => $record['fr'],
            'pa'             => $record['pa'],
            'pam'            => $record['pam'],
            'gl'             => $record['gl'],
            'soam'           => $record['soam'],
            'soap'           => $record['soap'],
            'hgt'            => $record['hgt'],
            'fill_capillary' => $record['fill_capillary'],
            't'              => $record['t'],
            'p'              => $record['p'],
            'lcf'            => $record['lcf'],
            'eva'            => $record['eva'],   // Cargar EVA
            'co2'            => $record['co2'],   // Cargar CO2
        ];
        $this->isEditMode = true;
        $this->showModal = true;
    }

    public function saveVitalSign()
    {
        // Validar datos con las mismas reglas que VitalSignRequest
        $validator = Validator::make($this->form, (new \App\Http\Requests\VitalSign\VitalSignRequest())->rules());
        $validator->validate();

<<<<<<< HEAD
        if (!is_null($this->event) && $this->isEditMode && $this->form['id']) {
            // Actualizar registro existente
            $vs = VitalSign::findOrFail($this->form['id']);
            $vs->update($this->form);
        } else if (is_null($this->event)) {
            // Crear nuevo registro e insertar event_id
            $newData = $this->form;
            $vs = VitalSign::create($newData);
=======
        if ($this->event && $this->form['id']) {
            // Actualizar registro existente
            $vs = VitalSign::findOrFail($this->form['id']);
            $vs->update($this->form);
        } else if ($this->event) {
            // Crear nuevo registro con event_id existente
            $newData = array_merge($this->form, ['event_id' => $this->event->id]);
            VitalSign::create($newData);
        } else {
            // Crear nuevo registro sin event_id y emitir para almacenar temporalmente
            $vs = VitalSign::create($this->form);
>>>>>>> e73d7699 (SAMU: Rollback vital signs)
            $this->emitUp('addVitalSigns', $vs->id);
        }

        // Cerrar modal, recargar listado y resetear formulario
        $this->showModal = false;
<<<<<<< HEAD
        $this->resetForm();
        $this->loadVitalSigns();
=======
        $this->resetForm();        
>>>>>>> e73d7699 (SAMU: Rollback vital signs)
    }

    public function deleteVitalSign($index)
    {
        // Eliminar registro
        $record = $this->vitalSigns[$index];
        VitalSign::findOrFail($record['id'])->delete();
        $this->loadVitalSigns();
    }

    public function resetForm()
    {
        $this->form = [
            'id'             => null,
            'registered_at'  => null,
            'fc'             => null,
            'fr'             => null,
            'pa'             => null,
            'pam'            => null,
            'gl'             => null,
            'soam'           => null,
            'soap'           => null,
            'hgt'            => null,
            'fill_capillary' => null,
            't'              => null,
            'p'              => null,
            'lcf'            => null,
            'eva'            => null,
            'co2'            => null,
        ];
    }

    public function render()
    {
        return view('livewire.samu.vital-sign.table');
    }
}
