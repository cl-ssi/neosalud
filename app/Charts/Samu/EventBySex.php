<?php

namespace App\Charts\Samu;

use App\Enums\Key as EnumsKey;
use App\Models\Samu\Event;

class EventBySex
{
    public $dataset;

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
        $exceptKey = [EnumsKey::KEY_605, EnumsKey::KEY_606];
        $sexs = ['MALE', 'FEMALE', 'UNKNOWN', 'OTHER', null];

        $this->dataset = array([
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
                ->whereNotIn('samu_events.key_id', $exceptKey)
                ->count();

            $this->dataset[] = [translateSex($sex), $totalBySex, 'color: #006cb7'];
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
