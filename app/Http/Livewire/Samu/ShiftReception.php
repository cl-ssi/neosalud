<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Samu\ShiftsReception as ShiftsReceptionModel;


class ShiftReception extends Component
{
    use WithPagination;
    public $nursingShift;

    public $showModal = false;
    public $selectedShift = null;


    /*     public function mount($nursingShift = null)
    {
        $this->nursingShift = ShiftsReceptionModel::findOrFail($nursingShift);
    } */

    public function render()
    {
        /* if ($this->nursingShift) {
            $data = ['nursingShift' => $this->nursingShift];
        } else {
            $data = ['shifts' => ShiftsReceptionModel::orderBy('date', 'desc')->paginate(10)];
        }
        return view('livewire.samu.shifts-reception', $data); */
        $shifts = ShiftsReceptionModel::orderBy('date', 'desc')->paginate(10);
        return view('livewire.samu.shiftsreception', ['shifts' => $shifts]);
    }

    public function showShiftModal($id)
    {
        $this->selectedShift = ShiftsReceptionModel::findOrFail($id);
        $this->showModal = true;
    }
}
