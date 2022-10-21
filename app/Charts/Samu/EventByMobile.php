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
     * @return void
     */
    public function __construct($year = null, $month = null)
    {
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
        $this->dataset = array([
            'Comuna',
            '# de Eventos del mes ' .  $this->date->monthName . ' del año ' . $this->date->year,
            ["role" => 'style' ],
            ["role" => 'annotation' ],
        ]);

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
     * @return void
     */
    public function getDataset()
    {
        return $this->dataset;
    }
}
