<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use App\Models\Samu\Alteration;

class Alterations extends Component
{
    public $alterations;
    public $view;

    public $alteration;
    public $type;
    public $name;


    protected function rules()
    {
        /* Esto fixea que si seleccionas una fecha en el navegador 
         * y luego la borras, se pasa un string vacio en vez de null */
        empty($this->valid_to) ? $this->valid_to = null : $this->valid_to;

        return [
            'name' => 'required|min:4',
            'type' => 'required'
        ];
    }

    protected $messages = [
        'name.required' => 'El nombre es requerido.',
        'type.required' => 'El tipo es requerido.'
    ];

    public function mount()
    {
        $this->alterations = Alteration::orderBy('name')->get();
        $this->view = 'index';
    }

    public function index()
    {
        $this->view = 'index';
    }

    public function create()
    {
        $this->view = 'create';
        $this->alteration = null;

        $this->type = null;
        $this->name = null;
    }

    public function store()
    {
        Alteration::create($this->validate());
        $this->mount();
        $this->view = 'index';
    }

    public function edit(Alteration $alteration)
    {
        $this->view = 'edit';
        $this->alteration = $alteration;
        
        $this->type = $alteration->type;
        $this->name = $alteration->name;
    }

    public function update(Alteration $alteration)
    {
        $alteration->update($this->validate());

        $this->mount();
        $this->view = 'index';
    }

    public function delete(Alteration $alteration)
    {
        $alteration->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.samu.alterations');
    }
}
