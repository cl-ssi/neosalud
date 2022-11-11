<?php

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Samu\MobileType;

class EventMobileTypeMonthly
{
    public $dataset;
    public $year;
    public $month;
    public $date;
    public $mobilesType;

    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct($year = null, $month = null)
    {
        $this->dataset = [];
        $this->year = $year ? $year : now()->year;
        $this->month = $month ? $month : now()->month;
        //$this->date = Carbon::parse("$this->year/$this->month/01");
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
        $eventByMonth = Event::query()
            ->onlyValid()
            ->join('samu_mobiles_in_service', 'mobile_in_service_id', '=', 'samu_mobiles_in_service.id')
            ->selectRaw('count(*) AS valor, type_id')
            ->whereMonth('date', $this->month)
            ->whereYear('date', $this->year)
            ->groupBy('type_id')
            ->orderBy('type_id', 'ASC')
            ->get();
        
        foreach($eventByMonth as $event){    
            $this->dataset[] = [$this->mobilesType->where('id', $event->type_id)->first()->name, $event->valor, 'color: #c90076', $event->valor];
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