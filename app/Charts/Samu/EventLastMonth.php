<?php

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EventLastMonth
{
    public $dataset;
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
        $this->start = $this->end->copy()->subDays(30);
        $this->setDataset();
    }

    /**
     * Set the statistics
     *
     * @return void
     */
    public function setDataset()
    {
        $rangeDates = $this->start->range($this->end);
        $this->dataset = array([
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

            $this->dataset[] = [$date->format('d/m/Y'), $totalEvents, 'color: #006cb7', $totalEvents];
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
