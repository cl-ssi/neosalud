<?php

namespace App\Charts\Samu;

use App\Enums\MobileType as EnumMobileType;
use App\Helpers\Date;
use App\Models\Samu\Event;
use App\Models\Samu\MobileType;
use Illuminate\Support\Carbon;

class EventMobileType
{
    public $dataset;
    public $end;
    public $start;
    public $rangeDates;
    public $mobilesType;
    public $results;

    /**
     * Initializes the chart.
     *
     * @param string $end
     * @return void
     */
    public function __construct($end = null)
    {
        $this->end = $end ? Carbon::parse($end) : now();
        $this->start = $this->end->copy()->subDays(15);
        $this->rangeDates = $this->start->range($this->end);
        $this->setMobilesType();
        $this->setDataset();
    }

    /**
     * Assign the mobiles type
     *
     * @return void
     */
    public function setMobilesType()
    {
        $this->mobilesType = MobileType::get();
    }

    /**
     * Set the statistics
     *
     * @return void
     */
    public function setDataset()
    {
        $dateTemp = [];
        $dateTemp[] = ['name' => 'Tipo/Día'];
        $this->getWeekCollection();
        $position = 0;
        $i =  $this->results[$position]['total'];

        foreach($this->rangeDates as $index => $date)
        {
            if($i == $index)
            {
                //$i = $i + $this->results[$position + 1]['total'];
                if (isset($this->results[$position]) && isset($this->results[$position]['total'])) {
                    $i = $this->results[$position]['total'];
                } else {
                    $i = 0;
                }



                $dateTemp[] = 'TOTAL';
                $position++;
            }
            $dateTemp[] = $date->format('d-M');
        }

        $dateTemp[] = 'TOTAL';
        $this->dataset[] = $dateTemp;
        $position = 0;
        $last = count($this->results);

        foreach($this->mobilesType as $type)
        {
            $data = [];
            $data[] = ['name' => $type->name];

            $eventByDay = Event::query()
                ->onlyValid()
                ->with('mobileInService')
                ->when($type->name == EnumMobileType::M1
                    || $type->name == EnumMobileType::M2
                    || $type->name == EnumMobileType::M3
                    || $type->name == EnumMobileType::HIBRID, function($query) use($type) {
                        $query->whereHas('mobileInService', function ($query) use($type) {
                            $query->whereHas('type', function($query) use($type) {
                                $query->whereId($type->id);
                            });
                        });
                }, function ($query) use($type) {
                    $query->whereHas('mobile', function ($query) use($type) {
                        $query->whereHas('type', function($query) use($type) {
                            $query->whereId($type->id);
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
                    //$i = $i + $this->results[$position + 1]['total'];
                    if (isset($this->results[$position]) && isset($this->results[$position]['total']) && isset($this->results[$position+1]['total'])) {
                        $i = $i + $this->results[$position+1]['total'];
                    } else {
                        $i = 0;
                    }
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
