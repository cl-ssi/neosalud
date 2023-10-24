<?php

namespace App\Charts\Samu;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CallsByClassification
{
    public $year;
    public $month;
    public $dataset;

    /**
     * Initializes the chart.
     *
     * @param  string  $year
     * @param  string  $month
     * @return void
     */
    public function __construct($year = null, $month = null)
    {
        $this->year = $year ?? now()->year;
        $this->month = $month ?? now()->month;

        $this->setDataset();
    }

    /**
     * Set the data stats
     *
     * @return void
     */
    public function setDataset()
    {
        $start = Carbon::parse("$this->year/$this->month/01");
        $start = $start->startOfMonth();

        $end = $start->copy()->endOfMonth();

        $this->dataset = [];

        $records = DB::table('samu_calls')
            ->whereNull('call_id')
            ->whereBetween('hour', [$start, $end])
            ->selectRaw('count(*) as total, classification',)
            ->groupBy('classification')
            ->get();

        foreach($records as $record)
        {
            $this->dataset[] = [$record->classification ?? 'SIN CLASIFICACION', $record->total, 'color: #006cb7', $record->total];
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