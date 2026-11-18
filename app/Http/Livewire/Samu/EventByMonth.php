<?php

namespace App\Http\Livewire\Samu;

use App\Exports\Samu\EventsByMonth;
use App\Models\Samu\Event;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

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
        $this->setDates();
    }

    public function hydrate()
    {
        $this->setDates();
    }

    public function setDates()
    {
        if ($this->year_month) {
            $parts = explode("-", $this->year_month);
            if (count($parts) === 2 && is_numeric($parts[0]) && is_numeric($parts[1])) {
                $this->year = (int)$parts[0];
                $this->month = (int)$parts[1];
            }
        }

        if (!$this->year || !$this->month) {
            $this->year = now()->year;
            $this->month = now()->month;
            $this->year_month = $this->year . "-" . Str::padLeft($this->month, 2, '0');
        }

        $this->start = Carbon::createFromDate($this->year, $this->month, 1)->startOfDay();
        $this->end = $this->start->copy()->endOfMonth()->endOfDay();
    }

    public function render()
    {
        return view('livewire.samu.event-by-month', [
            'events' => $this->getEvents()
        ]);
    }

    public function getEvents()
    {
        $this->setDates();

        return Event::query()
            ->onlyValid()
            ->whereBetween('date', [$this->start->format('Y-m-d'), $this->end->format('Y-m-d')])
            ->with([
                'call',
                'call.commune',
                'mobile',
                'commune',
                'establishment',
                'receptionPlace',
                'mobileInService',
                'mobileInService.mobile'
            ])
            ->orderByDesc('id')
            ->paginate(10);
    }

    public function updatedYearMonth($yearMonth)
    {
        $this->resetPage();
        $this->setDates();
    }

    public function download()
    {
        $this->setDates();
        $filename = 'eventos desde ' . $this->start->format('Y-m-d') . ' al ' . $this->end->format('Y-m-d') . '.xlsx';
        return Excel::download(new EventsByMonth($this->start, $this->end), $filename);
    }
}
