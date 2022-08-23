<?php

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EventLastMonth
{
    public $myDataset;
    public $start;
    public $end;

    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct($end = null)
    {
        $this->end = $end ? Carbon::parse($end) : now();
        $this->start = $this->end->copy()->subDays(29);
        $this->getData();
    }

    /**
     * Get the statistics data
     *
     * @return void
     */
    public function getData()
    {
        $rangeDates = $this->start->range($this->end);
        $this->myDataset = array([
            'fecha',
            'eventos',
            ["role" => 'style' ],
            ["role" => 'annotation' ],
        ]);

        foreach($rangeDates as $date)
        {
            $totalEvents = Event::query()
                ->select('date', DB::raw('count(date) as total'))
                ->whereDate('date', $date->format('Y-m-d'))
                ->count();

            $this->myDataset[] = [$date->format('d/m/Y'), $totalEvents, 'color: #006cb7', $totalEvents];
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
