<?php

namespace App\Helpers;

use Illuminate\Support\Carbon;

class Date
{
    /**
     * Gets an epidemiological week
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getWeek(Carbon $date = null)
    {
        $week = collect([]);
        $now = $date ? $date : now();

        if($now->dayOfWeek == 0)
        {
            $start = $now;
            $end = $start->copy()->addDays(6);
        }
        else
        {
            $start = $now->startOfWeek();
            $start = $start->copy()->subDay();
            $end = $start->copy();
            $end = $end->addDays(6);
        }

        $week['start'] = $start;
        $week['end'] = $end;

        return $week;
    }

    /**
     * Obtains the N epidemiological weeks
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getWeeks(Carbon $date = null, int $numberWeeks = 0)
    {
        $collectionWeeks = collect([]);
        $start = Date::getWeek($date ? $date : now());
        $start = $start['start'];
        $start = $start->copy()->startOfWeek(Carbon::SUNDAY)->subWeek($numberWeeks);

        for($i = 1; $i <= $numberWeeks + 1; $i++)
        {
            $end = $start->copy()->addDays(6);

            $collectionWeeks->push([
                'start' => $start,
                'end' => $end
            ]);

            $start = $end->copy()->addDay();
        }

        return $collectionWeeks;
    }
}
