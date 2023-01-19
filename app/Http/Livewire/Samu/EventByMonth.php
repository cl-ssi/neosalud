<?php

namespace App\Http\Livewire\Samu;

use App\Exports\Samu\EventsByMonth;
use App\Models\Samu\Event;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class EventByMonth extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $year_month;
    public $month;
    public $year;
    public $start;
    public $end;

    public function mount()
    {
        $this->month = now()->month;
        $this->year = now()->year;
        $this->year_month = $this->year . "-" . Str::padLeft($this->month, 2, '0');
        $this->start = Carbon::parse($this->year . "-" . $this->month . "-01");
        $this->end = $this->start->copy()->endOfMonth();
    }

    public function render()
    {
        return view('livewire.samu.event-by-month',[
            'events' => $this->getEvents()
        ]);
    }

    public function getEvents()
    {
        $events = Event::query()
            ->onlyValid()
            ->whereBetween('date', [$this->start, $this->end])
            ->paginate(10);

        return $events;
    }

    public function updatedYearMonth($yearMonth)
    {
        $yearMonth = explode("-", $yearMonth);
        $this->year = $yearMonth[0];
        $this->month = $yearMonth[1];
        $this->start = Carbon::parse($this->year . "-" . $this->month . "-01");
        $this->end = $this->start->copy()->endOfMonth();
        $this->render();
    }

    public function download()
    {
        $filename = 'eventos desde ' . $this->start->format('Y-m-d') . ' al ' . $this->end->format('Y-m-d') . '.xlsx';
        return Excel::download(new EventsByMonth($this->start, $this->end), $filename);
    }
}
