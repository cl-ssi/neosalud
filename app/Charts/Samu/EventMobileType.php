<?php

namespace App\Charts\Samu;

use App\Helpers\Date;
use App\Models\Samu\Event;
use Illuminate\Support\Carbon;

class EventMobileType
{
    public $dataset;
    public $end;
    public $start;
    public $rangeDates;
    public $types;
    public $results;

    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct($end = null)
    {
        $this->end = $end ? Carbon::parse($end) : now();
        $this->start = $this->end->copy()->subDays(15);
        $this->rangeDates = $this->start->range($this->end);
        $this->setTypes();
        $this->setDataset();
    }

    /**
     * Assign the types of mobiles
     *
     * @return void
     */
    public function setTypes()
    {
        $this->types = [
            ['id' => 'M1', 'type' => 'interna'],
            ['id' => 'M2', 'type' => 'interna'],
            ['id' => 'M3', 'type' => 'interna'],
            ['id' => 'Hibrido', 'type' => 'interna'],
            ['id' => 'RU1', 'type' => 'externa'],
            ['id' => 'RU2', 'type' => 'externa'],
        ];
    }

    /**
     * Set the statistics
     *
     * @return void
     */
    public function setDataset()
    {
        $dateTemp = [];
        $dateTemp[] = ['id' => 'Tipo/Día', 'type' => 'Tipo/Dia'];
        $this->getWeekCollection();
        $position = 0;
        $i =  $this->results[$position]['total'];

        foreach($this->rangeDates as $index => $date)
        {
            if($i == $index)
            {
                $i = $i + $this->results[$position + 1]['total'];
                $dateTemp[] = 'TOTAL';
                $position++;
            }
            $dateTemp[] = $date->format('d-M');
        }

        $dateTemp[] = 'TOTAL';
        $this->dataset[] = $dateTemp;
        $position = 0;
        $last = count($this->results);

        foreach($this->types as $type)
        {
            $data = [];
            $data[] = $type;

            $eventByDay = Event::query()
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


            $position = 0;
            $i =  $this->results[$position]['total'];

            foreach($this->rangeDates as $index => $date)
            {
                if($i == $index)
                {
                    $cloneQuery = clone $eventByDay;// TODO: REFACTORIZAR
                    $total = $cloneQuery->whereDate('date', '>=', $this->results[$position]['start'])
                        ->whereDate('date', '<=', $this->results[$position]['end'])
                        ->count();
                    $i = $i + $this->results[$position + 1]['total'];
                    $data[] = ['total' => $total, 'strong' => true];
                    $position++;
                }

                $cloneQuery = clone $eventByDay;// TODO: REFACTORIZAR
                $totalEvents = $cloneQuery->whereDate('date', $date->format('Y-m-d'))->count();
                $data[] = $totalEvents;
            }

            $cloneQuery = clone $eventByDay;
            $total = $cloneQuery->whereDate('date', '>=', $this->results[$last-1]['start'])
                ->whereDate('date', '<=', $this->end)
                ->count();
            $data[] = ['total' => $total, 'strong' => true];
            $this->dataset[] = $data;
        }
    }

    /**
     * Create the epidemiological week
     *
     * @return void
     */
    public function getWeekCollection()
    {
        $start = $this->start->copy()->startOfDay();
        $end = $this->end->copy()->startOfDay();
        $week = Date::getWeek(Carbon::parse($start));
        $collection = [];

        $info['start'] = $week['start'];
        $info['end'] = $week['end'];
        $info['total'] = $start->diffInDays($week['end']) + 1;
        $collection[] = $info;
        $i = 1;

        foreach($this->rangeDates as $datx)
        {
            $datx = $datx->copy()->startOfDay();
            if(!$datx->betweenIncluded($week['start']->startOfDay(), $week['end']->startOfDay()))
            {
                $i++;
                $week = Date::getWeek($datx);
                $info['start'] = $week['start'];
                $info['end'] = $week['end'];
                $info['total'] = 7;
                $collection[] = $info;
            }
        }

        if(!$end->betweenIncluded($week['start'], $week['end']))
        {
            $i++;
            $week = Date::getWeek($end);
            $info['start'] = $week['start'];
            $info['end'] = $week['end'];
            $collection[] = $info;
        }

        if($end->format('Y-m-d') != $collection[$i-1]['end']->format('Y-m-d'))
        {
            $d = Carbon::parse($collection[$i-1]['start'])->startOfDay();
            $end = $end->copy()->startOfDay();
            $total = $d->diffInDays($end) + 1;
        }
        else
            $total = 7;

        $collection[$i-1]['total'] = $total;

        $this->results = $collection;
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
