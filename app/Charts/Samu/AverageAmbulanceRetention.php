<?php

namespace App\Charts\Samu;

use App\Helpers\Date;
use App\Models\Samu\Event;
use Illuminate\Support\Facades\DB;

class AverageAmbulanceRetention
{
    public $collectionWeeks;
    public $dataset;

    /**
     * Initializes the chart
     *
     * @return void
     */
    public function __construct()
    {
        $this->collectionWeeks = Date::getWeeks(null, 3);
        $this->setDataset();
    }

    /**
     * Set the statistics
     *
     * @return void
     */
    public function setDataset()
    {
        $this->dataset = collect([]);
        foreach($this->collectionWeeks as $week)
        {
            $events = Event::query()
                ->onlyValid()
                ->whereNotNull('healthcenter_at')
                ->whereNotNull('return_base_at')
                ->whereHas('shift', function($query) use($week) {
                    $query->whereDate('opening_at', '>=', $week['start'])
                        ->whereDate('closing_at', '<=', $week['end']);
                })
                ->select(
                    DB::raw('MINUTE(TIMEDIFF(healthcenter_at, return_base_at)) as difference'),
                    'id',
                    'date',
                    'healthcenter_at',
                    'return_base_at',
                )
                ->get();

            $quantity = $events->count();
            $sum = $events->sum('difference');
            $avg = $quantity > 0 ? $sum / $quantity : 0;

            $data['start'] = $week['start']->format('d/m');
            $data['end'] = $week['end']->format('d/m');
            $data['quantity'] = $quantity;
            $data['sum'] = $sum;
            $data['avg'] = round($avg);

            $this->dataset->push($data);
        }
    }

    /**
     * Get dataset
     *
     * @return array
     */
    public function getDataset()
    {
        return $this->dataset;
    }
}
