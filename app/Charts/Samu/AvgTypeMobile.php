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
    public $types;

    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        $this->collectionWeeks = Date::getWeeks(null, 3);
        $this->setTypes();
        $this->setDataset();
    }

    /**
     * Assign mobiles type
     *
     * @return void
     */
    public function setTypes()
    {
        $this->types = MobileType::whereIn('id', [1, 2, 3, 4])->get();
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

            foreach($this->types as $type)
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

                $qty = $mobiles->count();
                $sum = $mobiles->sum('total');
                $avg = ($qty != 0) ? $sum / $qty : 0;

                $data['quantity_' . $type->name] = $qty;
                $data['sum_' . $type->name] = $sum;
                $data['name'] = $type->name;
                $data['avg_' . $type->name] = round($avg, 0);
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
