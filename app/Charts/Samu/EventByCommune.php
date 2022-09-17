<?php

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventByCommune
{
    public $dataset;
    public $date;
    public $month;
    public $year;

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
            ->with('commune')
            ->select('commune_id', DB::raw('count(*) as total'))
            ->whereMonth('date', $this->date->month)
            ->whereYear('date', $this->date->year)
            ->groupBy('commune_id')
            ->get();

        foreach($events as $event)
        {
            $nameCommune = $event->commune ? $event->commune->name : 'NO INFORMADO';
            $this->dataset[] = [Str::upper($nameCommune), $event->total, 'color: #c90076', $event->total];
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
