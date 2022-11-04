<?php

namespace App\Charts\Samu;

use App\Models\Gender;
use App\Models\Samu\Event;
use Illuminate\Support\Carbon;

class EventByGenderAndAge
{
    public $start;
    public $end;
    public $genders;
    public $ages;
    public $dataset;

    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct($start = null, $end = null)
    {
        $this->start = $start ? Carbon::parse($start) : now()->startOfMonth();
        $this->end = $end ? Carbon::parse($end) : now()->endOfMonth();
        $this->setGenders();
        $this->setAgeGroup();
        $this->setDataset();
    }

    /**
     * Set the genders
     *
     * @return void
     */
    public function setGenders()
    {
        $genders = Gender::get(['id', 'text'])->toArray();
        $genders[] = ['id' => null, 'text' => "NO INFORMADO"];
        $this->genders = $genders;
    }

    /**
     * Set the age group
     *
     * @return void
     */
    public function setAgeGroup()
    {
        $this->ages = collect([
            [
                'start' => 0,
                'end' => 5,
            ],
            [
                'start' => 6,
                'end' => 11,
            ],
            [
                'start' => 12,
                'end' => 18,
            ],
            [
                'start' => 19,
                'end' => 26,
            ],
            [
                'start' => 27,
                'end' => 59,
            ],
            [
                'start' => 60,
                'end' => 150,
            ],
            [
                'start' => null,
                'end' => null,
            ]
        ]);
    }

    /**
     * Set the statistics
     *
     * @return void
     */
    public function setDataset()
    {
        $this->dataset = collect([]);
        foreach($this->ages as $age)
        {
            $rows = [];
            foreach($this->genders as $gender)
            {
                $query = Event::query()
                    ->onlyValid()
                    ->whereBetween('created_at', [$this->start, $this->end]);

                if($age['start'] === null && $age['end'] === null)
                    $query->whereNull('age_year');
                else
                    $query->whereBetween('age_year', [$age['start'],$age['end']]);

                $subquery = clone $query;
                if($gender['id'] != null)
                    $rows[] = $query->whereGenderId($gender['id'])->count();
                else
                    $rows[] = $query->whereNull('gender_id')->count();
            }

            // total by age group
            $rows[] = $subquery->count();

            $this->dataset->push($rows);
        }

        $rows = [];
        // total by genders
        foreach($this->genders as $gender)
        {
            $query = Event::query()
                    ->onlyValid()
                    ->whereBetween('created_at', [$this->start, $this->end]);

            $subquery = clone $query;

            if($gender['id'] != null)
                $rows[] = $query->whereGenderId($gender['id'])->count();
            else
                $rows[] = $query->whereNull('gender_id')->count();
        }

        // total per selected month
        $rows[] = $subquery->whereBetween('created_at', [$this->start, $this->end])->count();

        $this->dataset->push($rows);
    }

    /**
     * Get the dataset
     *
     * @return \Illuminate\Support\Collection
     */
    public function getDataset()
    {
        return $this->dataset;
    }

    /**
     * Get the genders
     *
     * @return \Illuminate\Support\Collection
     */
    public function getGenders()
    {
        return $this->genders;
    }

    /**
     * Get the age group
     *
     * @return array
     */
    public function getAgeGroup()
    {
        return $this->ages;
    }

    /**
     * Get the start
     *
     * @return array
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Get the end
     *
     * @return array
     */
    public function getEnd()
    {
        return $this->end;
    }
}
