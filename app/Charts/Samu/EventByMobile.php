<?php

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EventByMobile
{
    public $dataset;
    public $year;
    public $month;
    public $date;

    /**
     * Initializes the chart.
     *
     * @param  string $year
     * @param  string $month
     * @return void
     */
    public function __construct($year = null, $month = null)
    {
        $this->dataset = [];
        $this->year = $year ? $year : now()->year;
        $this->month = $month ? $month : now()->month;
        $this->date = Carbon::parse("$this->year/$this->month/01");
        $this->setDataset();
    }

    /**
     * Set the statistics
     *
     * @return void
     */
    public function setDataset()
    {
        $events = Event::query()
            ->onlyValid()
            ->with('mobile')
            ->whereHas('mobile', function ($query) {
                $query->whereName('SAMU');
            })
            ->select('mobile_id', DB::raw('count(*) as total'))
            ->whereMonth('date', $this->date->month)
            ->whereYear('date', $this->date->year)
            ->groupBy('mobile_id')
            ->get();

        foreach($events as $event)
        {
            $nameMobile = $event->mobile
                ? ($event->mobile->code . ' - ' . $event->mobile->name )
                : 'SIN MOVIL';

            $this->dataset[] = [$nameMobile, $event->total, 'color: #c90076', $event->total];
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
