<?php

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EventMobileType
{
    public $myDataset;
    public $end;
    public $start;

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
        $data[] = 'Tipo/Día';
        $types = ['M1', 'M2', 'M3', 'Hibrido'];

        foreach($rangeDates as $date)
            $data[] = $date->format('d-M');

        $this->myDataset[] = $data;

        foreach($types as $type)
        {
            $data = [];
            $data[] = $type;

            $eventByDay = Event::query()
                ->select('date', DB::raw('count(date) as total'))
                ->with('mobileInService')
                ->whereHas('mobileInService', function ($query) use($type) {
                    $query->whereHas('type', function($query) use($type) {
                        $query->whereName($type);
                    });
                });

            foreach($rangeDates as $date)
            {
                $cloneQuery = clone $eventByDay;
                $totalEvents = $cloneQuery->whereDate('date', $date->format('Y-m-d'))->count();
                $data[] = $totalEvents;
            }

            $this->myDataset[] = $data;
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
