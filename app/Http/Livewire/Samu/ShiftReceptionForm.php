<?php

namespace App\Http\Livewire\Samu;

use App\Models\Samu\ShiftsReception as ShiftsReceptionModel;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

class ShiftReceptionForm extends Component
{

    public $shiftReception = null;
    public $nursingShift = null;
    public $isEditing = false;
    public $activeTab = 'encabezado';

    // Main fields
    public $date, $shift, $shift_leader, $room_key = false;
    public $medical_regulator, $nursing_regulator;
    public $dispatcher_regulator, $operators_regulator;
    public $handover, $receive, $signature;

    // Dynamic arrays
    public $absences = [];
    public $cards = [];
    public $radio_loans = [];
    public $vehicles = [];
    public $fuel_status = [];
    public $equipment_loans = [];
    public $portable_oxygen = [];
    public $novelties = [];
    public $secondary_transfers = [];

    public function mount($nursingShift = null)
    {
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

        // Initialize arrays with at least one empty row
        $this->absences = [['staff' => '', 'reason' => '', 'absence_days' => '', 'replacement' => '']];
        $this->cards = [['vehicle' => '', 'fuel_card' => '', 'vehicle2' => '', 'bathroom_card' => '', 'lanyard_hah1' => '', 'lanyard_blue2' => '']];
        $this->radio_loans = [['radio_number' => '', 'personnel' => '', 'vehicle' => '']];
        $this->vehicles = [['vehicle' => '', 'type' => '', 'driver' => '']];
        $this->fuel_status = [['vehicle' => '', 'fuel_status' => '', 'o2_status' => '', 'refill' => '']];
        $this->equipment_loans = [['equipment' => '', 'service' => '', 'responsible' => '']];
        $this->portable_oxygen = [['cylinder_quantity' => '', 'full' => '', 'empty' => '', 'refill' => '']];
        $this->novelties = [['novelty' => '']];
        $this->secondary_transfers = [['detail' => '']];
    }

    public function addRow($section)
    {
        $this->$section[] = [];
    }

    public function removeRow($section, $index)
    {
        if (count($this->$section) > 1) {
            unset($this->$section[$index]);
            $this->$section = array_values($this->$section);
        } else {
            // If it's the last row, clear the fields
            $this->$section[0] = array_fill_keys(array_keys($this->$section[0] ?? []), '');
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
            'absences' => array_filter($this->absences, function ($item) {
                return !empty(array_filter($item));
            }),
            'cards' => array_filter($this->cards, function ($item) {
                return !empty(array_filter($item));
            }),
            'radio_loans' => array_filter($this->radio_loans, function ($item) {
                return !empty(array_filter($item));
            }),
            'vehicles' => array_filter($this->vehicles, function ($item) {
                return !empty(array_filter($item));
            }),
            'fuel_status' => array_filter($this->fuel_status, function ($item) {
                return !empty(array_filter($item));
            }),
            'equipment_loans' => array_filter($this->equipment_loans, function ($item) {
                return !empty(array_filter($item));
            }),
            'portable_oxygen' => array_filter($this->portable_oxygen, function ($item) {
                return !empty(array_filter($item));
            }),
            'novelties' => array_filter($this->novelties, function ($item) {
                return !empty(array_filter($item));
            }),
            'secondary_transfers' => array_filter($this->secondary_transfers, function ($item) {
                return !empty(array_filter($item));
            }),
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
