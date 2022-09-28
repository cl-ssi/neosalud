<?php

namespace App\Http\Livewire\Samu;

use App\Http\Requests\Shift\StoreShiftUserRequest;
use Livewire\Component;
use App\Models\User;
use App\Models\Samu\ShiftUser as ShiftUserModel;
use App\Models\Samu\JobType;
use App\Models\Samu\Shift;

class ShiftUser extends Component
{
    public $users;
    public $shift;
    public $job_types;

    public $user_id;
    public $job_type_id;
    public $shift_id;
    public $assumes_at;
    public $leaves_at;

    public function rules()
    {
        return (new StoreShiftUserRequest($this->shift))->rules();
    }

    public function render()
    {
        return view('livewire.samu.shift-user');
    }

    public function mount()
    {
        $this->users = User::query()
        ->with('permissions')
        ->orderBy('text')
        ->permission(['SAMU operador', 'SAMU regulador', 'SAMU despachador'])
        ->dontHavePermission('SAMU auditor')
        ->pluck('id', 'text');

        $this->job_types = JobType::where('tripulant', false)->orderBy('name')->get();
        $this->assumes_at = $this->shift->opening_at->format('Y-m-d\TH:i');
    }

    public function resetInputs()
    {
        $this->user_id = '';
        $this->job_type_id = '';
        $this->assumes_at = $this->shift->opening_at->format('Y-m-d\TH:i');
        $this->leaves_at = null;
    }

    public function store()
    {
        $dataValidated = $this->validate();
        $dataValidated['shift_id'] = $this->shift->id;
        ShiftUserModel::create($dataValidated);

        $this->shift->refresh();
        $this->resetInputs();
    }

    public function delete(ShiftUserModel $shiftUser)
    {
        $shiftUser->delete();
        $this->shift->refresh();
    }
}
