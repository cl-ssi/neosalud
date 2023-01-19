<?php

namespace App\Exports\Samu;

use App\Models\Samu\Event;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EventsByMonth implements FromView
{
    public $start;
    public $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }
    /**
     *
     */
    public function view(): View
    {
        return view('exports.samu.events-by-month', [
            'events' => $this->getEvents()
        ]);
    }

    public function getEvents()
    {
        $events = Event::query()
            ->onlyValid()
            ->whereBetween('date', [$this->start, $this->end])
            ->get();
            
        return $events;
    }
}
