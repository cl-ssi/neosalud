<?php

namespace App\Http\Livewire\Samu;

use App\Http\Requests\Shift\UpdateShiftUserRequest;
use App\Models\Samu\ShiftUser;
use Livewire\Component;

class ShiftUserEdit extends Component
{
    public $shiftUser;
    public $assumes_at;
    public $leaves_at;

    public function rules()
    {
        return (new UpdateShiftUserRequest($this->shiftUser->shift))->rules();
    }

    public function mount(ShiftUser $shiftUser)
    {
        $this->shiftUser = $shiftUser;
        $this->assumes_at = ($this->shiftUser->assumes_at != null)
            ? $this->shiftUser->assumes_at->format('Y-m-d\TH:i')
            : null;
        $this->leaves_at = ($this->shiftUser->leaves_at != null)
            ? $this->shiftUser->leaves_at->format('Y-m-d\TH:i')
            : null;
    }

    public function render()
    {
        return view('livewire.samu.shift-user-edit');
    }

    public function edit()
    {
        $dataValidated = $this->validate();
        $this->shiftUser->update($dataValidated);

        session()->flash('success', 'Las fechas fue actualizada exitosamente');
        return redirect()->route('samu.shift.index');
    }
}
