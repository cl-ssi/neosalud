<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use App\Models\Samu\Event;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;

class RemStatistics extends Component implements FromView
{
    protected $listeners = ['updateDate' => 'changePeriod'];

    public $month;

    public $year;

    protected $chartData;

    protected $rem;

    public const LABELS = [
        'SCA' => 'Sindrome Coronario Agudo',
        'PCR' => 'Paro Cardiaco Respiratorio',
        'PT' => 'Politraumatismo',
        'OTHERS' => 'Otros',
    ];

    protected const SCA = [5];

    protected const PCR = [2];

    protected const PT = [63, 64, 65, 66, 67, 68, 69]; //201*, 401d, 402b, 701i 

    //TODO: Critical calls.r1 & calls.r2
    protected const CRITICAL = ['r1', 'r2']; //['101a', '102a', '105a', '105b', '105c', '107a', '201c', '401b', '402b', '501a', '501b', '403d', '701i']
    // protected const CRITICAL = [2, 13, 35, 36, 37, 46, 66, 78, 86, 93, 96, 97, 127]; //['101a', '102a', '105a', '105b', '105c', '107a', '201c', '401b', '402b', '501a', '501b', '403d', '701i']

    protected const MOBILES = [
        'BASIC' => [1, 5],
        'ADVANCED' => [2, 3, 6],
        'HYBRID' => [4]
    ];

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

    public $showExportModal = false;

    public $exportSection = 'N';

    public function mount()
    {
        $this->changePeriod();
    }

    public function render()
    {
        $stats = $this->getStats();
        return view('livewire.samu.rem-statistics', [
            'K' => $stats['section_k'],
            'N' => $stats['section_n'],
            'L' => $stats['section_l'],
            // 'all_events' => $this->rem->get()->toArray(),
        ]);
    }

    public function getEvents()
    {
        $events = Event::whereMonth('created_at', $this->month)
            ->whereYear('created_at', $this->year) //6006003200
            ->with('key', 'call')
            ->has('call');
        return $events;
    }

    public function getStats()
    {
        $events = $this->getEvents();
        $aux = clone $events;
        $out = [];

        // $this->rem = $events->get();
        $out['section_k'] = $this->getSectionK($events);
        $events = clone $aux;
        $out['section_n'] = $this->getSectionN($events);
        $events = clone $aux;
        $out['section_l'] = $this->getSectionL($events);
        return $out;
    }

    public function getSectionK($query)
    {
        $events = clone $query;
        $sectionK =  [];
        // Basic
        $basicEvents = $events->whereIn('mobile_id', self::MOBILES['BASIC']);
        $aux = clone $basicEvents;
        $sectionK['BASIC']['COUNT']['TOTAL'] = $basicEvents->count();
        $sectionK['BASIC']['RECIPIENTS'] = $basicEvents->get()->unique('patient_identification')->count();

        $basicCriticalEvents = $basicEvents->whereHas('call', fn($query) => $query->whereIn('triage', self::CRITICAL));
        $sectionK['BASIC']['COUNT']['CRITICAL'] = $basicCriticalEvents->count();

        $basicEvents = $aux;
        $basicNonCriticalEvents = $basicEvents->whereHas('call', fn($query) => $query->whereNotIn('triage', self::CRITICAL));
        $sectionK['BASIC']['COUNT']['UNCRITICAL'] = $basicNonCriticalEvents->count();
        $basicCriticalArrivalTimes = $this->getTimeRanges($basicCriticalEvents->whereNotNull('mobile_departure_at')->whereNotNull('mobile_arrival_at')->get());
        $sectionK['BASIC']['CRITICAL'] = $basicCriticalArrivalTimes;
        $basicNonCriticalArrivalTimes = $this->getTimeRanges($basicNonCriticalEvents->whereNotNull('mobile_departure_at')->whereNotNull('mobile_arrival_at')->get());
        $sectionK['BASIC']['UNCRITICAL'] = $basicNonCriticalArrivalTimes;

        $events = clone $query;
        // Advanced
        $advancedEvents = $events->whereIn('mobile_id', self::MOBILES['ADVANCED']);
        $aux = clone $advancedEvents;
        $sectionK['ADVANCED']['COUNT']['TOTAL'] = $advancedEvents->count();
        $sectionK['ADVANCED']['RECIPIENTS'] = $advancedEvents->get()->unique('patient_identification')->count();
        $advancedCriticalEvents = $advancedEvents->whereHas('call', fn($query) => $query->whereIn('triage', self::CRITICAL));
        $sectionK['ADVANCED']['COUNT']['CRITICAL'] = $advancedCriticalEvents->count();
        $advancedEvents = $aux;
        $advancedNonCriticalEvents = $advancedEvents->whereHas('call', fn($query) => $query->whereNotIn('triage', self::CRITICAL));
        $sectionK['ADVANCED']['COUNT']['UNCRITICAL'] = $advancedNonCriticalEvents->count();
        $advancedCriticalArrivalTimes = $this->getTimeRanges($advancedCriticalEvents->whereNotNull('mobile_departure_at')->whereNotNull('mobile_arrival_at')->get());
        $sectionK['ADVANCED']['CRITICAL'] = $advancedCriticalArrivalTimes;
        $advancedNonCriticalArrivalTimes = $this->getTimeRanges($advancedNonCriticalEvents->whereNotNull('mobile_departure_at')->whereNotNull('mobile_arrival_at')->get());
        $sectionK['ADVANCED']['UNCRITICAL'] = $advancedNonCriticalArrivalTimes;
        return $sectionK;
    }

    public function getSectionN($events)
    {
        $events = $events->whereNotNull('gender_id');
        $aux = clone $events;
        $SCA = $this->ageRangeByGender($events->get(), self::SCA);
        $PCR = $this->ageRangeByGender($events->get(), self::PCR);
        $PT = $this->ageRangeByGender($events->get(), self::PT);
        $OTHERS = $this->ageRangeByGender($events->whereNotIn('key_id', array_merge(self::SCA, self::PCR, self::PT))->get());
        $events = clone $aux;
        $criticalEvents = $events->whereHas('call', fn($query) => $query->whereIn('triage', self::CRITICAL));
        $events = clone $aux;
        $nonCriticalEvents = $events->whereHas('call', fn($query) => $query->whereNotIn('triage', self::CRITICAL))->get();
        $CRITICAL = $this->ageRangeByGenderCritical($criticalEvents);
        $UNCRITICAL = $this->ageRangeByGender($nonCriticalEvents, null);

        return [
            'SCA' => $SCA,
            'PCR' => $PCR,
            'PT' => $PT,
            'OTHERS' => $OTHERS,
            'CRITICAL' => $CRITICAL,
            'UNCRITICAL' => $UNCRITICAL,
        ];
    }

    public function getSectionL($events)
    {
        $filteredEvents = $events->whereHas('call', function ($query) {
            $query->where('classification', 'T1');
        });
        $aux = clone $filteredEvents;
        $basicEvents = $filteredEvents->where('mobile_id', 1)->get();
        $filteredEvents = $aux;
        $advancedEvents = $filteredEvents->whereIn('mobile_id', [2, 3])->get();
        $basicTotal = $basicEvents->count();
        $basicUniques = $basicEvents->unique('patient_identification')->count();
        $advancedTotal = $advancedEvents->count();
        $advancedUniques = $advancedEvents->unique('patient_identification')->count();
        return [
            'BASIC' => [
                'TOTAL' => $basicTotal,
                'UNIQUE' => $basicUniques,
            ],
            'ADVANCED' => [
                'TOTAL' => $advancedTotal,
                'UNIQUE' => $advancedUniques,
            ]
        ];
    }

    public function ageRangeByGender($events, array $key = null)
    {
        // Events Variables
        $maleEvents = $events->filter(fn($e) => $e->gender_id == 1);
        $maleEvents = $key ? $maleEvents->whereIn('key_id', $key) : $maleEvents;
        $femaleEvents = $events->filter(fn($e) => $e->gender_id == 2);
        $femaleEvents = $key ? $femaleEvents->whereIn('key_id', $key) : $femaleEvents;

        // Total Count
        $totals['both'] = $key ? $events->whereIn('key_id', $key)->count() : $events->count();
        $totals['male'] = $maleEvents->count();
        $totals['female'] = $femaleEvents->count();
        $genderByAge = $this->convertAgeByGender($maleEvents, $femaleEvents, $totals);
        return $genderByAge;
    }

    public function ageRangeByGenderCritical($events)
    {
        // Events Variables
        $aux = clone $events;
        $maleEvents = $events->where('gender_id', 1)->whereHas('call', fn($query) => $query->whereIn('triage', self::CRITICAL))->get();
        $events = clone $aux;
        $femaleEvents = $events->where('gender_id', 2)->whereHas('call', fn($query) => $query->whereIn('triage', self::CRITICAL))->get();

        // Total Count
        $events = $aux;
        $totals['both'] = $events->whereHas('call', fn($query) => $query->whereIn('triage', self::CRITICAL))->count();
        $totals['male'] = $maleEvents->count();
        $totals['female'] = $femaleEvents->count();
        $genderByAge = $this->convertAgeByGender($maleEvents, $femaleEvents, $totals);
        return $genderByAge;
    }

    public function convertAgeByGender($maleEvents, $femaleEvents, $totals)
    {
        $genderByAge = [];
        $genderByAge['total'] = $totals;

        foreach ($this->ages as $range) {
            $genderByAge[$range[0] . '-' . $range[1]]['male'] = $maleEvents->filter($ageFilter = function ($event) use ($range) {
                return ($range[1] === '+') ? ($event->age_year >= $range[0]) : ($event->age_year >= $range[0] && $event->age_year <= $range[1]);
            })->count();
            $genderByAge[$range[0] . '-' . $range[1]]['female'] = $femaleEvents->filter($ageFilter)->count();
        }
        return $genderByAge;
    }

    public function getTransportTime($event)
    {
        return $event->mobile_arrival_at->diffInMinutes($event->mobile_departure_at);
    }

    public function getTimeRanges($events)
    {
        $times = $events->map(function ($event) {
            if ($event->mobile_departure_at && $event->mobile_arrival_at) {
                return $this->getTransportTime($event);
            }
            return null;
        })->filter(function ($time) {
            return $time !== null; // Filter out null values
        })->toArray();
        $arrivalTimes = [];
        $arrivalTimes['0 - 20 min'] = count(array_filter($times, function ($time) {
            return $time <= 20;
        }));

        $arrivalTimes['20 - 40 min'] = count(array_filter($times, function ($time) {
            return $time > 20 && $time <= 40;
        }));

        $arrivalTimes['More than 40 min'] = count(array_filter($times, function ($time) {
            return $time > 40;
        }));
        return $arrivalTimes;
    }

    public function showExportOptions($show = false)
    {
        // $this->showExportModal = $show;
        $this->showExportModal = false;
    }

    public function setExportSection($section)
    {
        $this->exportSection = $section;
        $this->showExportOptions(false);
        if ($section === 'K') {
            $this->exportSection = 'K';
        } else if ($section === 'N') {
            $this->exportSection = 'N';
        } else {
            $this->exportSection = 'L';
        }
        return Excel::download(new RemStatistics, 'Seccion' . $this->exportSection . '.xlsx');
    }

    public function view(): View
    {
        $stats = $this->getStats();
        $view = view('samu.rem', ['stats' => $stats]);
        switch ($this->exportSection) {
            case 'K':
                $view = view('samu.rem.export-k', ['stats' => $stats]);
                break;
            case 'N':
                $view = view(
                    'samu.rem.export-n',
                    [
                        'stats' => $stats,
                        'ages' => $this->ages,
                        'labels' => self::LABELS
                    ]
                );
                break;
            case 'L':
                $view = view('samu.rem.export-l', ['stats' => $stats]);
                break;
        }
        return $view;
    }

    public function changePeriod($month = null, $year = null)
    {
        $this->month = $month ?? now()->month;
        $this->year = $year ?? now()->year;
    }
}
