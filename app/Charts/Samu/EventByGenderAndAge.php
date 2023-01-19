<?php

namespace App\Charts\Samu;

use App\Models\Gender;
use App\Models\Samu\Event;
use Illuminate\Support\Carbon;

class EventByGenderAndAge
{
    public $year;
    public $month;
    public $genders;
    public $ages;
    public $dataset;

    /**
     * Initializes the chart.
     * @param  string  $year
     * @param  string  $month
     * @return void
     */
    public function __construct($year = null, $month = null)
    {
        $this->year = $year ? $year : now()->year;
        $this->month = $month ? $month : now()->month;
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
                    ->whereMonth('created_at', $this->month)
                    ->whereYear('created_at', $this->year);

                if($age['start'] === null && $age['end'] === null)
                    $query->whereNull('age_year');
                else
                    $query->whereBetween('age_year', [$age['start'], $age['end']]);

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
                    ->whereMonth('created_at', $this->month)
                    ->whereYear('created_at', $this->year);

            $subquery = clone $query;

            if($gender['id'] != null)
                $rows[] = $query->whereGenderId($gender['id'])->count();
            else
                $rows[] = $query->whereNull('gender_id')->count();
        }

        // total per selected month
        $rows[] = $subquery->whereMonth('created_at', $this->month)->whereYear('created_at', $this->year)->count();

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
}
