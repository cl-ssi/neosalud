<?php

namespace App\Charts\Samu;

use App\Helpers\Date;
use App\Models\Samu\Event;
use App\Models\Samu\MobileInService;
use Illuminate\Support\Facades\DB;

class AvgTypeMobile
{
    public $collectionsWeeks;
    public $dataset;

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
        $this->types = [
            ['name' => 'M2', 'id' => 2, 'type' => 'interna'],
            ['name' => 'M1', 'id' => 1, 'type' => 'interna'],
            ['name' => 'M3', 'id' => 3, 'type' => 'interna'],
            ['name' => 'Hibrido', 'id' => 4,'type' => 'interna'],
            ['name' => 'RU2',  'id' => 6, 'type' => 'externa'],
            ['name' => 'RU1',  'id' => 5,'type' => 'externa'],
        ];
    }

    /**
     * Set the data stats
     *
     * @return void
     */
    public function setDataset()
    {
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
                    ->whereTypeId($type['id'])
                    ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(type_id) as total'), 'type_id')
                    ->groupBy('date', 'type_id')
                    ->get();

                $qty = $mobiles->count();
                $sum = $mobiles->sum('total');
                $avg = ($qty != 0) ? $sum / $qty : 0;

                // $data['quantity_' . $type['name']] = $qty;
                // $data['sum_' . $type['name']] = $sum;
                $data['avg_' . $type['name']] = round($avg, 0);
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
