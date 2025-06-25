<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use App\Models\Samu\Event;

class RemStatistics extends Component
{
    protected $month;
    protected $year;
    protected $chartData;

    protected const LABELS = [
        'SCA' => 'Sindrome Coronario Agudo',
        'PCR' => 'Paro Cardiaco Respiratorio',
        'PT' => 'Politraumatismo',
        'OTHERS' => 'Otros'
    ];
    protected const SCA = [5];
    protected const PCR = [2];
    protected const PT = [63, 64, 65, 66, 67, 68, 69];

    protected $ages = [
        ['0', '4'],
        ['5', '9'],
        ['10', '14'],
        ['15', '19'],
        ['20', '24'],
        ['25', '29'],
        ['30', '34'],
        ['35', '39'],
        ['40', '44'],
        ['45', '49'],
        ['50', '54'],
        ['55', '59'],
        ['60', '64'],
        ['65', '69'],
        ['70', '74'],
        ['75', '79'],
        ['80', '+'],
    ];

    public function mount()
    {
        $this->month = now()->month;
        $this->year = now()->year;
    }

    public function render()
    {
        $stats = $this->getStats();
        return view('livewire.samu.rem-statistics', ['stats' => $stats]);
    }

    public function getStats()
    {
        $events = $this->getEvents();
        $stats = [];
        $stats['SCA'] = $this->ageRangeByGender($events, self::SCA);
        $stats['PCR'] = $this->ageRangeByGender($events, self::PCR);
        $stats['PT'] = $this->ageRangeByGender($events, self::PT);
        $otherEvents = $events->whereNotIn('key_id', array_merge(self::SCA, self::PCR, self::PT));
        $stats['OTHERS'] = $this->ageRangeByGender($otherEvents);
        return $stats;
    }

    public function ageRangeByGender($events, array $key = null)
    {
        $genderByAge = [];

        // Events Variables        
        $maleEvents = $events->filter(fn($e) => $e->gender_id == 1);
        $maleEvents = $key ? $maleEvents->whereIn('key_id', $key) : $maleEvents;
        $femaleEvents = $events->filter(fn($e) => $e->gender_id == 2);
        $femaleEvents = $key ? $femaleEvents->whereIn('key_id', $key) : $femaleEvents;

        // Total Count
        $genderByAge['total']['both'] = $key ? $events->whereIn('key_id', $key)->count() : $events->count();
        $genderByAge['total']['male'] = $maleEvents->count();
        $genderByAge['total']['female'] = $femaleEvents->count();

        foreach ($this->ages as $range) {
            $genderByAge[$range[0] . '-' . $range[1]]['male'] = $maleEvents->filter($ageFilter = function ($event) use ($range) {
                return ($range[1] === '+') ? ($event->age_year >= $range[0]) : ($event->age_year >= $range[0] && $event->age_year <= $range[1]);
            })->count();
            $genderByAge[$range[0] . '-' . $range[1]]['female'] = $femaleEvents->filter($ageFilter)->count();
        }
        return $genderByAge;
    }

    public function getEvents()
    {
        $events = Event::whereMonth('created_at', $this->month)
            ->whereYear('created_at', $this->year)
            ->onlyValid()
            ->with('key')
            ->get();
        return $events;
    }
}
