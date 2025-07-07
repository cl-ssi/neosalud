<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use App\Models\Samu\Event;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;

class RemStatistics extends Component implements FromView
{
    protected $month;
    protected $year;
    protected $chartData;

    public const LABELS = [
        'SCA' => 'Sindrome Coronario Agudo',
        'PCR' => 'Paro Cardiaco Respiratorio',
        'PT' => 'Politraumatismo',
        'OTHERS' => 'Otros',
    ];
    protected const SCA = [5];
    protected const PCR = [2];
    protected const PT = [63, 64, 65, 66, 67, 68, 69]; //201*, 401d, 402b, 701i 
    protected const CRITICAL = [2, 13, 35, 36, 37, 46, 66, 78, 86, 93, 96, 97, 127]; //['101a', '102a', '105a', '105b', '105c', '107a', '201c', '401b', '402b', '501a', '501b', '403d', '701i']

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


        // STATS SECTION K
        // Calculate basic and advanced mobile stats
        $basicEvents = $events->whereIn('mobile_id', self::MOBILES['BASIC']);
        $advancedEvents = $events->whereIn('mobile_id', self::MOBILES['ADVANCED']);

        // Basic Totals
        $basicTotal = $basicEvents->count();
        $basicCriticalEvents = $basicEvents->whereIn('key_id', self::CRITICAL);
        $basicCriticalTotal = $basicCriticalEvents->count();
        $basicNonCriticalEvents = $basicEvents->whereNotIn('key_id', self::CRITICAL);
        $basicNonCriticalTotal = $basicNonCriticalEvents->count();

        // Advanced Totals
        $advancedTotal = $advancedEvents->count();
        $advancedCriticalEvents = $advancedEvents->whereIn('key_id', self::CRITICAL);
        $advancedCriticalTotal = $advancedCriticalEvents->count();
        $advancedNonCriticalEvents = $advancedEvents->whereNotIn('key_id', self::CRITICAL);
        $advancedNonCriticalTotal = $advancedNonCriticalEvents->count();

        // Unique Patients Basic and Advanced
        $basicBeneficiaries = $basicEvents->unique('patient_identification')->count();
        $advancedBeneficiaries = $advancedEvents->unique('patient_identification')->count();

        // Basic Arrival Times
        $basicCriticalArrivalTimes = $this->getTimeRanges($basicCriticalEvents->whereNotNull('mobile_departure_at')->whereNotNull('mobile_arrival_at'));
        $basicNonCriticalArrivalTimes = $this->getTimeRanges($basicNonCriticalEvents->whereNotNull('mobile_departure_at')->whereNotNull('mobile_arrival_at'));

        // Advanced Arrival Times
        $advancedCriticalArrivalTimes = $this->getTimeRanges($advancedCriticalEvents->whereNotNull('mobile_departure_at')->whereNotNull('mobile_arrival_at'));
        $advancedNonCriticalArrivalTimes = $this->getTimeRanges($advancedNonCriticalEvents->whereNotNull('mobile_departure_at')->whereNotNull('mobile_arrival_at'));


        // STATS SECTION N
        $SCA = $this->ageRangeByGender($events, self::SCA);
        $PCR = $this->ageRangeByGender($events, self::PCR);
        $PT = $this->ageRangeByGender($events, self::PT);
        $otherEvents = $events->whereNotIn('key_id', array_merge(self::SCA, self::PCR, self::PT));
        $OTHERS = $this->ageRangeByGender($otherEvents);

        // Calculate CRITICAL and UNCRITICAL stats
        $criticalEvents = $events->whereIn('key_id', self::CRITICAL);
        $nonCriticalEvents = $events->whereNotIn('key_id', self::CRITICAL);
        $CRITICAL = $this->ageRangeByGender($criticalEvents, self::CRITICAL);
        $UNCRITICAL = $this->ageRangeByGender($nonCriticalEvents, null);

        $stats = [
            // Section K
            'BASIC' => [
                'COUNT' => [
                    'TOTAL' => $basicTotal,
                    'CRITICAL' => $basicCriticalTotal,
                    'UNCRITICAL' => $basicNonCriticalTotal,
                ],
                'RECIPIENTS' => $basicBeneficiaries,
                'CRITICAL' => $basicCriticalArrivalTimes,
                'UNCRITICAL' => $basicNonCriticalArrivalTimes,
            ],
            'ADVANCED' => [
                'COUNT' => [
                    'TOTAL' => $advancedTotal,
                    'CRITICAL' => $advancedCriticalTotal,
                    'UNCRITICAL' => $advancedNonCriticalTotal,
                ],
                'RECIPIENTS' => $advancedBeneficiaries,
                'CRITICAL' => $advancedCriticalArrivalTimes,
                'UNCRITICAL' => $advancedNonCriticalArrivalTimes,
            ],

            // Section N
            'SCA' => $SCA,
            'PCR' => $PCR,
            'PT' => $PT,
            'OTHERS' => $OTHERS,
            'CRITICAL' => $CRITICAL,
            'UNCRITICAL' => $UNCRITICAL,
        ];

        return $stats;
    }

    public function getEvents()
    {
        $events = Event::whereMonth('created_at', 6) // $this->month
            ->whereYear('created_at', $this->year)
            ->with('key')
            ->get();
        return $events;
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
        $this->showExportModal = $show;
    }

    public function setExportSection($section)
    {
        $this->exportSection = $section;
        $this->showExportOptions(false);
        if ($section === 'K') {
            $this->exportSection = 'K';
        } else {
            $this->exportSection = 'N';
        }
        return Excel::download(new RemStatistics, 'Seccion' . $this->exportSection . '.xlsx');
    }

    public function view(): View
    {
        $stats = $this->getStats();
        // dd($this->exportSection);
        $view = null;
        if ($this->exportSection === 'K') {
            $view = view('samu.rem.export-k', [
                'stats' => $stats
            ]);
        } else if ($this->exportSection === 'N') {
            $view = view(
                'samu.rem.export-n',
                [
                    'stats' => $stats,
                    'ages' => $this->ages,
                    'labels' => self::LABELS
                ]
            );
        } else {
            $view = view('samu.rem');
        }
        return $view;
    }
}
