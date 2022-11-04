<?php

namespace App\Http\Livewire\Samu\Dashboard;

use App\Charts\Samu\EventByGenderAndAge as SamuEventByGenderAndAge;
use Illuminate\Support\Carbon;
use Livewire\Component;

class EventByGenderAndAge extends Component
{
    public $start;
    public $end;
    public $ages;
    public $genders;
    public $years;
    public $rows;
    public $month;
    public $year;

    public function mount()
    {
        $this->month = now()->month;
        $this->year = now()->year;
        $this->getYears();
        $this->getDate();
        $this->getStadistic();
    }

    public function render()
    {
        return view('livewire.samu.dashboard.event-by-gender-and-age');
    }

    public function getStadistic()
    {
        $eventByGenderAndAge = new SamuEventByGenderAndAge($this->start, $this->end);
        $this->ages = $eventByGenderAndAge->getAgeGroup();
        $this->genders = $eventByGenderAndAge->getGenders();
        $this->start = $eventByGenderAndAge->getStart();
        $this->end = $eventByGenderAndAge->getEnd();
        $this->rows = $eventByGenderAndAge->getDataset();
    }

    public function getDate()
    {
        $this->start = $this->year . "-" . $this->month . "-01";
        $end = Carbon::parse($this->start);
        $this->end = $end->endOfMonth()->format('Y-m-d');

    }

    public function getYears()
    {
        $this->years = collect([
            $this->year - 1,
            $this->year,
            $this->year + 1
        ]);
    }

    public function updatedMonth($value)
    {
        $this->month = $value;
        $this->getDate();
        $this->getStadistic();
    }
}
