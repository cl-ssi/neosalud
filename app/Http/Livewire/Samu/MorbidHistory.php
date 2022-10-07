<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use App\Models\Samu\MorbidHistory as MorbidHistoryModel;

class MorbidHistory extends Component
{
    public $morbidHistories;
    public $view;

    public $morbidHistory;
    public $name;


    protected function rules()
    {
        /* Esto fixea que si seleccionas una fecha en el navegador 
         * y luego la borras, se pasa un string vacio en vez de null */
        empty($this->valid_to) ? $this->valid_to = null : $this->valid_to;

        return [
            'name' => 'required|min:4'
        ];
    }

    protected $messages = [
        'name.required' => 'El nombre es requerido.'
    ];

    public function mount()
    {
        $this->morbidHistories = MorbidHistoryModel::orderBy('name')->get();
        $this->view = 'index';
    }

    public function index()
    {
        $this->view = 'index';
    }

    public function create()
    {
        $this->view = 'create';
        $this->morbidHistory = null;

        $this->name = null;
    }

    public function store()
    {
        MorbidHistoryModel::create($this->validate());
        $this->mount();
        $this->view = 'index';
    }

    public function edit(MorbidHistoryModel $morbidHistory)
    {
        $this->view = 'edit';
        $this->morbidHistory = $morbidHistory;
        
        $this->name = $morbidHistory->name;
    }

    public function update(MorbidHistoryModel $morbidHistory)
    {
        $morbidHistory->update($this->validate());

        $this->mount();
        $this->view = 'index';
    }

    public function delete(MorbidHistoryModel $morbidHistory)
    {
        $morbidHistory->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.samu.morbid-history');
    }
}
