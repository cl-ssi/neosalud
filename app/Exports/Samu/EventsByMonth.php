<?php

namespace App\Exports\Samu;

use App\Models\Samu\Event;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class EventsByMonth implements FromView, ShouldAutoSize, WithTitle
{
    public $start;
    public $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function view(): View
    {
        return view('exports.samu.events-by-month', [
            'events' => $this->getEvents()
        ]);
    }

    public function getEvents()
    {
        $startDate = $this->start instanceof Carbon
            ? $this->start->format('Y-m-d')
            : Carbon::parse($this->start)->format('Y-m-d');

        $endDate = $this->end instanceof Carbon
            ? $this->end->format('Y-m-d')
            : Carbon::parse($this->end)->format('Y-m-d');

        return Event::query()
            ->onlyValid()
            ->whereBetween('date', [$startDate, $endDate])
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
            ->orderBy('date')
            ->orderBy('id')
            ->get();
    }

    public function title(): string
    {
        $date = $this->start instanceof Carbon ? $this->start : Carbon::parse($this->start);
        return 'Eventos ' . $date->format('Y-m');
    }
}
