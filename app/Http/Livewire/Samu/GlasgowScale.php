<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use App\Models\Samu\GlasgowScale as GlasgowScaleModel;

class GlasgowScale extends Component
{
    public $glasgowScales;
    public $view;

    public $glasgowScale;
    public $age_range;
    public $type;
    public $name;
    public $value;


    protected function rules()
    {
        /* Esto fixea que si seleccionas una fecha en el navegador 
         * y luego la borras, se pasa un string vacio en vez de null */
        empty($this->valid_to) ? $this->valid_to = null : $this->valid_to;

        return [
            'name' => 'required|min:4',
            'value' => 'required|numeric',
            'age_range' => 'required',
            'type' => 'required'
        ];
    }

    protected $messages = [
        'name.required' => 'El nombre es requerido.',
        'value.required' => 'El valor es requerido. Debe ser valor numérico.',
        'age_range.required' => 'El tipo es requerido.',
        'type.required' => 'El tipo es requerido.'
    ];

    public function mount()
    {
        $this->glasgowScales = GlasgowScaleModel::orderBy('name')->get();
        $this->view = 'index';
    }

    public function index()
    {
        $this->view = 'index';
    }

    public function create()
    {
        $this->view = 'create';
        $this->glasgowScale = null;

        $this->age_range = null;
        $this->type = null;
        $this->name = null;
        $this->value = null;
    }

    public function store()
    {
        GlasgowScaleModel::create($this->validate());
        $this->mount();
        $this->view = 'index';
    }

    public function edit(GlasgowScaleModel $glasgowScale)
    {
        $this->view = 'edit';
        $this->glasgowScale = $glasgowScale;
        
        $this->age_range = $glasgowScale->age_range;
        $this->type = $glasgowScale->type;
        $this->name = $glasgowScale->name;
        $this->value = $glasgowScale->value;
    }

    public function update(GlasgowScaleModel $glasgowScale)
    {
        $glasgowScale->update($this->validate());

        $this->mount();
        $this->view = 'index';
    }

    public function delete(GlasgowScaleModel $glasgowScale)
    {
        $glasgowScale->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.samu.glasgow-scale');
    }
}
