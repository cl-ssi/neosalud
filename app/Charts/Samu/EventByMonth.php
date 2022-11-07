<?php

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class EventByMonth
{
    public $dataset;
    public $year;
    public $month;

    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct($year = null, $month = null)
    {
        $this->year = $year ? $year : now()->year;
        $this->month = $month ? $month : now()->month;
        $this->setDataset();
    }

    /**
     * Set the statistics
     *
     * @return void
     */
    public function setDataset()
    {
        $end = Carbon::parse("$this->year/$this->month/01");
        $start = $end->copy()->subMonths(11);
        $rangeMonths = CarbonPeriod::create($start->startOfMonth(), '1 month', $end->startOfMonth());

        $this->dataset = [];

        foreach($rangeMonths as $month)
        {
            $totalEvents = Event::query()
                ->onlyValid()
                ->whereMonth('date', '=', $month)
                ->whereYear('date', '=', $month)
                ->count();

            $monthName = Str::substr($month->monthName, 0, 3);

            $this->dataset[] = ["$monthName-$month->year", $totalEvents, 'color: #006cb7', $totalEvents];
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
