<?php

namespace App\Charts\Samu;

use App\Helpers\Date;
use App\Models\Samu\Shift;
use Illuminate\Support\Facades\DB;

class MobileTypeByJobType
{
    public $collectionWeek;
    public $shifts;
    public $mobilesType;
    public $jobsType;
    public $dataset;

    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        $this->collectionWeek = Date::getWeek();
        $this->setJobsType();
        $this->setMobilesType();
        $this->setShifts();
        $this->setDataset();
    }

    /**
     * Set the statistics
     *
     * @return void
     */
    public function setJobsType()
    {
        $this->jobsType = [
            [ 'id' => 8, 'name' => 'Reanimador' ],
            [ 'id' => 7, 'name' => 'Paramédico' ],
            [ 'id' => 6, 'name' => 'Conductor' ],
        ];
    }

    /**
     * Assign mobiles type
     *
     * @return void
     */
    public function setMobilesType()
    {
        $this->mobilesType = [
            [ 'name' => 'M2', 'id' => 2, 'type' => 'interna' ],
            [ 'name' => 'M1', 'id' => 1, 'type' => 'interna' ],
            [ 'name' => 'M3', 'id' => 3, 'type' => 'interna' ],
            [ 'name' => 'Hibrido', 'id' => 4,'type' => 'interna' ],
            [ 'name' => 'RU2',  'id' => 6, 'type' => 'externa' ],
            [ 'name' => 'RU1',  'id' => 5,'type' => 'externa' ],
        ];
    }

    /**
     * Assign shifts
     *
     * @return void
     */
    public function setShifts()
    {
        $this->shifts = Shift::query()
            ->whereNotNull('opening_at')
            ->whereNotNull('closing_at')
            ->whereDate('opening_at', '>=', $this->collectionWeek['start'])
            ->whereDate('closing_at', '<=', $this->collectionWeek['end'])
            ->join('samu_mobiles_in_service', 'samu_mobiles_in_service.shift_id', '=', 'samu_shifts.id')
            ->join('samu_mobile_crew', 'samu_mobile_crew.mobiles_in_service_id', '=', 'samu_mobiles_in_service.id')
            ->select([
                'samu_shifts.opening_at as opening_at',
                'samu_shifts.closing_at as closing_at',
                'samu_shifts.id as shift_id',
                'samu_mobiles_in_service.id as mobile_in_service_id',
                'samu_mobiles_in_service.type_id as mobile_in_service_type_id',
                'samu_mobile_crew.id as mobile_crew_id',
                'samu_mobile_crew.job_type_id as mobile_crew_job_type_id',
                'samu_mobile_crew.user_id as mobile_crew_user_id',
                DB::raw('HOUR(TIMEDIFF(opening_at, closing_at)) as difference'),
            ])
            ->get();
    }

    /**
     * Get the statistics data
     *
     * @return void
     */
    public function setDataset()
    {
        $this->dataset = collect([]);

        foreach($this->jobsType as $jobType)
        {
            $data = [];
            $data['job_type_name'] = $jobType['name'];
            foreach($this->mobilesType as $mobileType)
            {
                $data['total_' . $jobType['name'] . '_' . $mobileType['name']] = $this->shifts->where('mobile_crew_job_type_id', $jobType['id'])
                    ->where('mobile_in_service_type_id', $mobileType['id'])
                    ->sum('difference');
            }

            $data['total_'  . $jobType['name'] ] = $this->shifts->where('mobile_crew_job_type_id', $jobType['id'])->sum('difference');

            $this->dataset->push($data);
        }
    }

    /**
     * Get the statistics data
     *
     * @return \Illuminate\Support\Collection
     */
    public function getDataset()
    {
        return $this->dataset;
    }
}