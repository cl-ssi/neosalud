<?php

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;

class EventByMonth
{
    public $myDataset;
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
        $this->getData();
    }

    /**
     * Get the statistics data
     *
     * @return void
     */
    public function getData()
    {
        $end = Carbon::parse("$this->year/$this->month/01");
        $start = $end->copy()->subMonths(5);
        $rangeMonths = CarbonPeriod::create($start->startOfMonth(), '1 month', $end->startOfMonth());

        $this->myDataset = array([
            'Mes',
            '# de Eventos del mes',
            ["role" => 'style' ],
            ["role" => 'annotation' ],
        ]);

        foreach($rangeMonths as $month)
        {
            $totalEvents = Event::query()
                ->whereMonth('date', '=', $month)
                ->whereYear('date', '=', $month)
                ->count();

            $this->myDataset[] = ["$month->monthName-$month->year", $totalEvents, 'color: #006cb7', $totalEvents];
        }
    }

    /**
     * Get the dataset
     *
     * @return void
     */
    public function getDataset()
    {
        return $this->myDataset;
    }
}
