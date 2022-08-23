<?php

namespace App\Charts\Samu;

use App\Models\Samu\Event;

class EventBySex
{
    public $myDataset;

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
        $sexs = ['MALE', 'FEMALE', 'UNKNOWN', 'OTHER', null];

        $this->myDataset = array([
            'Género',
            '# de Eventos por sexo',
            ["role" => 'style' ]
        ]);

        foreach($sexs as $sex)
        {
            $totalBySex = Event::query()
                ->join('samu_calls', 'samu_calls.id', '=', 'samu_events.call_id')
                ->where('samu_calls.sex', '=', $sex)
                ->whereMonth('samu_events.date', $this->month)
                ->whereYear('samu_events.date', $this->year)
                ->count();

            $this->myDataset[] = [translateSex($sex), $totalBySex, 'color: #006cb7'];
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
