<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use App\Models\User;
use App\Models\Samu\JobType;
use App\Models\Samu\MobileInService;
use App\Models\Samu\MobileCrew as MobileCrewModel;

class MobileCrew extends Component
{
    public $users;
    public $mobileInService;

    public $user_id;
    public $job_type_id;
    public $assumes_at;
    public $leaves_at;

    protected $rules = [
        'user_id'       => 'required',
        'job_type_id'   => 'required',
        'assumes_at'    => 'required|date_format:Y-m-d\TH:i',
        'leaves_at'     => 'nullable|date_format:Y-m-d\TH:i|after:assumes_at'
    ];

    protected $messages = [
        'user_id.required'      => 'Debe selecionar un usuario',
        'job_type_id.required'  => 'Debe seleccionar una función',
        'assumes_at.required'   => 'Debe ingresar fecha y hora en que asume',
        'assumes_at.date_format'=>  'El campo asume debe tener un formato dd/mm/aaaa hh:mm aa',
        'leaves_at.date_format' =>  'El campo se retira debe tener un formato dd/mm/aaaa hh:mm aa',
    ];

    public function mount()
    {
        $this->assumes_at   = $this->mobileInService->shift->opening_at->format('Y-m-d\TH:i');
        $this->users        = User::OrderBy('text')->Permission('SAMU')->pluck('id','text');
        $this->job_types    = JobType::where('tripulant', true)->orderBy('name')->get();
    }

    public function store()
    {
        $validated = $this->validate();

        $mobileCrew = MobileCrewModel::create([
            'mobiles_in_service_id' => $this->mobileInService->id,
            'user_id'               => $this->user_id,
            'job_type_id'           => $validated['job_type_id'],
            'assumes_at'            => $validated['assumes_at'],
            'leaves_at'             => $validated['leaves_at']
        ]);

        $this->mobileInService->refresh();
        $this->assumes_at = $this->mobileInService->shift->opening_at->format('Y-m-d\TH:i');

        $this->reset([
            'user_id',
            'job_type_id',
            'leaves_at',
        ]);
        //redirect()->to(route('samu.mobileinservice.index'));
    }

    public function delete(MobileCrewModel $mobileCrew)
    {
        $mobileCrew->delete();

        $this->mobileInService->refresh();

        //redirect()->to(route('samu.mobileinservice.index'));
    }

    public function render()
    {
        return view('livewire.samu.mobile-crew');
    }
}
