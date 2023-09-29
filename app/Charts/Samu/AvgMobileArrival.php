<?php

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AvgMobileArrival
{
    public $year;
    public $month;
    public $dataset;

    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        $this->year = now()->year;
        $this->month = now()->month;

        $this->setDataset();
    }

    /**
     * Set the data stats
     *
     * @return void
     */
    public function setDataset()
    {
        $end = Carbon::parse("$this->year/$this->month/01");
        $start = $end->copy()->subMonths(11);

        $rangeMonths = CarbonPeriod::create($start->startOfMonth(), '1 month', $end->startOfMonth());

        $this->dataset = [];

        foreach($rangeMonths as $date)
        {
            $events = Event::query()
                ->whereNotNull('mobile_departure_at')
                ->whereNotNull('mobile_arrival_at')
                ->whereYear('date', $date->year)
                ->whereMonth('date', $date->month)
                ->get(['mobile_departure_at', 'mobile_departure_at', 'mobile_arrival_at']);

            $times = $events->map(function($event) {
                return $event->mobile_departure_at->diffInMinutes($event->mobile_arrival_at);
            });

            $times = $times->filter(function($time) {
                return $time > 0;
            });

            $avg = intval($times->avg());

            $monthName = Str::substr($date->monthName, 0, 3);

            $this->dataset[] = ["$monthName-$date->year", $avg, 'color: #006cb7', $avg];
        }
    }

    /**
     * Get the dataset
     *
     * @return array
     */
    public function getDataset()
    {
        return $this->dataset;
    }
}