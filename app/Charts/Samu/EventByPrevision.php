<?php

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EventByPrevision
{
    public $prevision;
    public $dataset;

    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct($year = null, $month = null)
    {
        $this->dataset = [];
        $this->year = $year ? $year : now()->year;
        $this->month = $month ? $month : now()->month;
        $this->getPrevisions();
        $this->setDataset();
    }

    /**
     * Set the dataset
     *
     * @return void
     */
    public function setDataset()
    {
        $this->dataset = [];
        $date = Carbon::parse($this->year . "-" . $this->month . "-01");

        foreach($this->previsions as $prevision)
        {
            $total = Event::query()
                ->onlyValid()
                ->whereNotNull('prevision')
                ->whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year)
                ->wherePrevision($prevision)
                ->count();

            $this->dataset[] = [
                $prevision,
                $total,
                'color: #c90076',
                $total
            ];
        }
    }

    public function getPrevisions()
    {
        $this->previsions = Event::query()
            ->select('prevision')
            ->whereNotNull('prevision')
            ->groupBy('prevision')
            ->orderBy('prevision')
            ->pluck('prevision');
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
