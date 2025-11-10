<?php

namespace App\Http\Livewire\Samu;

use App\Models\Samu\ShiftsReception as ShiftsReceptionModel;
use App\Models\Samu\Mobile;
use App\Models\Samu\MobileCrew;
use App\Models\Samu\Shift;
use App\Models\User;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

class ShiftReceptionForm extends Component
{

    public $shiftReception = null;
    public $nursingShift = null;
    public $isEditing = false;
    public $activeTab = 'encabezado';

    // Listas para los selects
    public $cardOptions = ['02', '13', '03', '05', '07', '4H'];
    public $crewUsers = [];
    public $mobilesInService = [];
    public $radioNumbers = [1, 2, 3, 4, 5, 6, 7];

    // Main fields
    public $date, $shift, $shift_leader, $room_key = false;
    public $medical_regulator, $nursing_regulator;
    public $dispatcher_regulator, $operators_regulator;
    public $handover, $receive, $signature;

    // Dynamic arrays
    public $absences = [];
    public $cards = [];
    public $radio_loans = [];
    public $mobiles = [];
    public $fuel_status = [];
    public $equipment_loans = [];
    public $portable_oxygen = [];
    public $novelties = [];
    public $secondary_transfers = [];

    public function mount($nursingShift = null)
    {
        $latestShift = Shift::latest()->first();
        if ($latestShift) {
            $mobileIds = $latestShift->mobilesInService->pluck('mobile_id');
            $this->mobilesInService = Mobile::whereIn('id', $mobileIds)->get();
        }
        $this->shift_leader = $latestShift->users->where('pivot.job_type_id', '=', '1')->first()->given ?? '';
        $this->medical_regulator = $latestShift->users->where('pivot.job_type_id', '2')->first()->given ?? '';
        $this->nursing_regulator = $latestShift->users->where('pivot.job_type_id', '3')->first()->given ?? '';
        $this->operators_regulator = $latestShift->users->where('pivot.job_type_id', '4')->first()->given ?? '';
        $this->dispatcher_regulator = $latestShift->users->where('pivot.job_type_id', '5')->first()->given ?? '';
        $this->crewUsers = $latestShift->users->pluck('text', 'id')->toArray();
        if ($nursingShift) {
            $this->nursingShift = ShiftsReceptionModel::findOrFail($nursingShift);
            $this->fill($this->nursingShift->toArray());
            $this->isEditing = true;
        } else {
            $this->resetForm();
        }
    }

    public function resetForm()
    {
        $this->date = now()->format('Y-m-d');
        $this->shift = '';
        $this->shift_leader = '';
        $this->room_key = false;

        // Inicializar arrays con una fila vacía
        $this->absences = [['user_id' => '', 'reason' => '', 'absence_days' => '', 'replacement' => '']];
        $this->cards = [['card_number' => '', 'mobile_id' => '']];
        $this->radio_loans = [['radio_number' => '', 'hour' => '', 'detail' => '']];
        $this->mobiles = [['mobile_id' => '', 'type' => '', 'driver' => '']];
        $this->fuel_status = [['mobile_id' => '', 'fuel_status' => '', 'o2_status' => '', 'refill' => '']];
        $this->equipment_loans = [['equipment' => '', 'service' => '', 'responsible' => '']];
        $this->portable_oxygen = [['cylinder_quantity' => '', 'full' => '', 'empty' => '', 'refill' => '']];
        $this->novelties = [['novelty' => '']];
        $this->secondary_transfers = [['detail' => '']];
    }

    public function addRow($section)
    {
        $newRow = [];
        switch ($section) {
            case 'absences':
                $newRow = ['user_id' => '', 'reason' => '', 'absence_days' => '', 'replacement' => ''];
                break;
            case 'cards':
                $newRow = ['card_number' => '', 'mobile_id' => ''];
                break;
            case 'radio_loans':
                $newRow = ['radio_number' => '', 'hour' => '', 'detail' => ''];
                break;
            case 'mobiles':
                $newRow = ['mobile_id' => '', 'type' => '', 'driver' => ''];
                break;
            case 'fuel_status':
                $newRow = ['mobile_id' => '', 'fuel_status' => '', 'o2_status' => '', 'refill' => ''];
                break;
            default:
                $newRow = [];
                break;
        }
        $this->$section[] = $newRow;
    }

    public function removeRow($section, $index)
    {
        if (count($this->$section) > 1) {
            unset($this->$section[$index]);
            $this->$section = array_values($this->$section);
        }
    }

    public function save()
    {
        $data = [
            'date' => $this->date,
            'shift' => $this->shift,
            'shift_leader' => $this->shift_leader,
            'room_key' => (bool) $this->room_key,
            'medical_regulator' => $this->medical_regulator,
            'nursing_regulator' => $this->nursing_regulator,
            'dispatcher_regulator' => $this->dispatcher_regulator,
            'operators_regulator' => $this->operators_regulator,
            'handover' => $this->handover,
            'receive' => $this->receive,
            'signature' => $this->signature,
            'absences' => array_filter($this->absences, fn($item) => !empty(array_filter($item))),
            'cards' => array_filter($this->cards, fn($item) => !empty(array_filter($item))),
            'radio_loans' => array_filter($this->radio_loans, fn($item) => !empty(array_filter($item))),
            'mobiles' => array_filter($this->mobiles, fn($item) => !empty(array_filter($item))),
            'fuel_status' => array_filter($this->fuel_status, fn($item) => !empty(array_filter($item))),
            'equipment_loans' => array_filter($this->equipment_loans, fn($item) => !empty(array_filter($item))),
            'portable_oxygen' => array_filter($this->portable_oxygen, fn($item) => !empty(array_filter($item))),
            'novelties' => array_filter($this->novelties, fn($item) => !empty(array_filter($item))),
            'secondary_transfers' => array_filter($this->secondary_transfers, fn($item) => !empty(array_filter($item))),
        ];

        if ($this->isEditing) {
            $this->nursingShift->update($data);
            session()->flash('message', 'Turno actualizado exitosamente.');
        } else {
            ShiftsReceptionModel::create($data);
            session()->flash('message', 'Turno creado exitosamente.');
        }

        $this->emit('refreshShiftReception');
        return redirect()->route('samu.shiftreception.index');
    }

    public function delete($id)
    {
        ShiftsReceptionModel::findOrFail($id)->delete();
        $this->emit('refreshShiftReception');
        session()->flash('message', 'Turno eliminado exitosamente.');
        return redirect()->route('samu.shiftreception.index');
    }

    public function cancel()
    {
        return redirect()->route('samu.shiftreception.index');
    }

    public function render()
    {
        return view('livewire.samu.shiftreception-form');
    }

    public function isActive(string $name): string
    {
        return ($this->activeTab == $name) ? 'show active' : '';
    }

    public function changeTab($name): Void
    {
        $this->activeTab = $name;
    }
}
