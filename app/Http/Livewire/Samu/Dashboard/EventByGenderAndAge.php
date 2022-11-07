<?php

namespace App\Http\Livewire\Samu\Dashboard;

use App\Charts\Samu\EventByGenderAndAge as SamuEventByGenderAndAge;
use Livewire\Component;

class EventByGenderAndAge extends Component
{
    public $ages;
    public $genders;
    public $years;
    public $rows;
    public $month;
    public $year;
    public $year_month;

    public function mount()
    {
        $this->year = $this->year ? $this->year : now()->year;
        $this->month = $this->month ? $this->month : now()->month;
        $this->year_month = $this->year . "-" . $this->month;
        $this->getStadistic();
    }

    public function render()
    {
        return view('livewire.samu.dashboard.event-by-gender-and-age');
    }

    public function getStadistic()
    {
        $eventByGenderAndAge = new SamuEventByGenderAndAge($this->year, $this->month);
        $this->ages = $eventByGenderAndAge->getAgeGroup();
        $this->genders = $eventByGenderAndAge->getGenders();
        $this->rows = $eventByGenderAndAge->getDataset();
    }

    public function updatedYearMonth($yearMonth)
    {
        $yearMonth = explode("-", $yearMonth);
        $this->year = $yearMonth[0];
        $this->month = $yearMonth[1];
        $this->getStadistic();
    }
}
