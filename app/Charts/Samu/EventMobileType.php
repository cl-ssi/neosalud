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
        $this->start = $this->end->copy()->subDays(30);
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
        $data[] = ['id' => 'Tipo/Día', 'type' => 'Tipo/Dia'];
        $types = [
            ['id' => 'M1', 'type' => 'interna'],
            ['id' => 'M2', 'type' => 'interna'],
            ['id' => 'M3', 'type' => 'interna'],
            ['id' => 'Hibrido', 'type' => 'interna'],
            ['id' => 'RU1', 'type' => 'externa'],
            ['id' => 'RU2', 'type' => 'externa'],
        ];

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
                ->when($type['type'] == 'interna', function($query) use($type) {
                    $query->whereHas('mobileInService', function ($query) use($type) {
                        $query->whereHas('type', function($query) use($type) {
                            $query->whereName($type['id']);
                        });
                    });
                }, function ($query) use($type) {
                    $query->whereHas('mobile', function ($query) use($type) {
                        $query->whereHas('type', function($query) use($type) {
                            $query->whereName($type['id']);
                        });
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
