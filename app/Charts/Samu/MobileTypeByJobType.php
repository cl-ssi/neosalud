<?php

namespace App\Charts\Samu;

use App\Helpers\Date;
use App\Models\Samu\JobType;
use App\Models\Samu\MobileInService;
use App\Models\Samu\MobileType;
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
        $this->jobsType = JobType::whereTripulant(1)->get();
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
     * Get week
     *
     * @return array
     */
    public function getWeek()
    {
        return $this->collectionWeek;
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
            $data['job_type_name'] = $jobType->name;
            $data['values'] = [];

            foreach($this->mobilesType as $mobileType)
            {
                $data['values'][] = $this->shifts->where('mobile_crew_job_type_id', $jobType->id)
                    ->where('mobile_in_service_type_id', $mobileType->id)
                    ->sum('difference');
            }

            $data['total'] = $this->shifts->where('mobile_crew_job_type_id', $jobType->id)->sum('difference');

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
