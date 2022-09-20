<?php

namespace App\Charts\Samu;

use App\Helpers\Date;
use App\Models\Samu\MobileInService;
use App\Models\Samu\MobileType;
use Illuminate\Support\Facades\DB;

class AvgTypeMobile
{
    public $collectionsWeeks;
    public $dataset;
    public $mobilesType;

    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        $this->collectionWeeks = Date::getWeeks(null, 3);
        $this->setMobilesType();
        $this->setDataset();
    }

    /**
     * Assign mobiles type
     *
     * @return void
     */
    public function setMobilesType()
    {
        $mobilesTypeId = MobileInService::query()
            ->groupBy('type_id')
            ->pluck('type_id');

        $this->mobilesType = MobileType::whereIn('id', $mobilesTypeId)->get();
    }

    /**
     * Get mobiles type
     *
     * @return \Illuminate\Support\Collection
     */
    public function getMobilesType()
    {
        return $this->mobilesType;
    }

    /**
     * Set the data stats
     *
     * @return void
     */
    public function setDataset()
    {
        $this->names = collect([]);

        foreach($this->collectionWeeks as $week)
        {
            $data['start'] = $week['start']->format('d/m');
            $data['end'] = $week['end']->format('d/m');
            $data['values'] = [];

            foreach($this->mobilesType as $type)
            {
                $mobiles = MobileInService::query()
                    ->whereHas('shift', function($query) use($week) {
                        $query->whereNotNull('opening_at')
                            ->whereNotNull('closing_at')
                            ->whereDate('opening_at', '>=', $week['start'])
                            ->whereDate('closing_at', '<=', $week['end']);
                    })
                    ->whereTypeId($type->id)
                    ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(type_id) as total'), 'type_id')
                    ->groupBy('date', 'type_id')
                    ->get();

                $sum = $mobiles->sum('total');
                $qty = $mobiles->count();
                $avg = ($qty != 0) ? round($sum / $qty, 0) : 0;

                /* 0: $sum, 1: $qty, 3: $avg */
                $data['values'][] = [$sum, $qty, $avg];
            }

            $this->dataset[] = $data;
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
