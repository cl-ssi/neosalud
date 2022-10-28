<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use App\Models\Samu\Medicine;

class Medicines extends Component
{
    public $medicines;
    public $view;

    public $medicine;
    public $code,$name,$valid_from,$valid_to,$value;

    protected function rules()
    {
        /* Esto fixea que si seleccionas una fecha en el navegador 
         * y luego la borras, se pasa un string vacio en vez de null */
        empty($this->valid_to) ? $this->valid_to = null : $this->valid_to;

        return [
            'code' => 'required',
            'name' => 'required|min:4',
            'valid_from' => 'required|date_format:Y-m-d',
            'valid_to' => 'nullable|date',
            'value' => 'integer',
        ];
    }

    protected $messages = [
        'code.required' => 'El código es requerido.',
        'name.required' => 'El nombre es requerido.',
        'valid_from.required' => 'La vigencia desde es requerida.',
        'value.required' => 'El valor del procedimiento es requerido.',
    ];

    public function mount()
    {
        $this->medicines = Medicine::orderBy('name')->get();
        $this->view = 'index';
    }

    public function index()
    {
        $this->view = 'index';
    }

    public function create()
    {
        $this->view = 'create';
        $this->medicine = null;
        
        $this->code = null;
        $this->name = null;
        $this->valid_from = null;
        $this->valid_to = null;
        $this->value = null;
    }

    public function store()
    {
        Medicine::create($this->validate());
        $this->mount();
        $this->view = 'index';
    }

    public function edit(Medicine $medicine)
    {
        $this->view = 'edit';
        $this->medicine = $medicine;
        
        $this->code = $medicine->code;
        $this->name = $medicine->name;
        $this->valid_from = $medicine->valid_from->format('Y-m-d');
        $this->valid_to = optional($medicine->valid_to)->format('Y-m-d');
        $this->value = $medicine->value;
    }

    public function update(Medicine $medicine)
    {
        $medicine->update($this->validate());

        $this->mount();
        $this->view = 'index';
    }

    public function delete(Medicine $medicine)
    {
        $medicine->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.samu.medicines');
    }
}
