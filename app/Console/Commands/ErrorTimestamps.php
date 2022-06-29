<?php

namespace App\Console\Commands;

use App\Models\Samu\Event;
use App\Rules\Samu\EventTimestamp;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ErrorTimestamps extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'error:timestamps';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Return the events with error in timestamps';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $events = Event::query()
            ->get([
                'id',
                'departure_at',
                'mobile_departure_at',
                'mobile_arrival_at',
                'route_to_healtcenter_at',
                'healthcenter_at',
                'patient_reception_at',
                'return_base_at',
                'on_base_at',
            ]);

        $collectionIds = collect([]);

        foreach($events as $event)
        {
            $dataValidated['departure_at'] = $event->departure_at ? $event->departure_at->format('Y-m-d H:i:s') : null;
            $dataValidated['mobile_departure_at'] = $event->mobile_departure_at ? $event->mobile_departure_at->format('Y-m-d H:i:s') : null;
            $dataValidated['mobile_arrival_at'] = $event->mobile_arrival_at ? $event->mobile_arrival_at->format('Y-m-d H:i:s') : null;
            $dataValidated['route_to_healtcenter_at'] = $event->route_to_healtcenter_at ? $event->route_to_healtcenter_at->format('Y-m-d H:i:s') : null;
            $dataValidated['healthcenter_at'] = $event->healthcenter_at ? $event->healthcenter_at->format('Y-m-d H:i:s') : null;
            $dataValidated['patient_reception_at'] = $event->patient_reception_at ? $event->patient_reception_at->format('Y-m-d H:i:s') : null;
            $dataValidated['return_base_at'] = $event->return_base_at ? $event->return_base_at->format('Y-m-d H:i:s') : null;
            $dataValidated['on_base_at'] = $event->on_base_at ? $event->on_base_at->format('Y-m-d H:i:s') : null;

            $validator = Validator::make($dataValidated, [
                'departure_at'              => [ 'nullable', 'date_format:Y-m-d H:i:s', new EventTimestamp($dataValidated, 'departure_at') ],
                'mobile_departure_at'       => [ 'nullable', 'date_format:Y-m-d H:i:s', new EventTimestamp($dataValidated, 'mobile_departure_at') ],
                'mobile_arrival_at'         => [ 'nullable', 'date_format:Y-m-d H:i:s', new EventTimestamp($dataValidated, 'mobile_arrival_at') ],
                'route_to_healtcenter_at'   => [ 'nullable', 'date_format:Y-m-d H:i:s', new EventTimestamp($dataValidated, 'route_to_healtcenter_at') ],
                'healthcenter_at'           => [ 'nullable', 'date_format:Y-m-d H:i:s', new EventTimestamp($dataValidated, 'healthcenter_at') ],
                'patient_reception_at'      => [ 'nullable', 'date_format:Y-m-d H:i:s', new EventTimestamp($dataValidated, 'patient_reception_at') ],
                'return_base_at'            => [ 'nullable', 'date_format:Y-m-d H:i:s', new EventTimestamp($dataValidated, 'return_base_at') ],
                'on_base_at'                => [ 'nullable', 'date_format:Y-m-d H:i:s', new EventTimestamp($dataValidated, 'on_base_at') ],
            ]);

            if($validator->fails())
            {
                $collectionIds->push($event->id);
            }
        }

        $file = $collectionIds->join(''. PHP_EOL);

        Storage::disk('public')->put(now()->format('Y-m-d-H-i-s') . '-event-timestamps.txt', $file);
    }
}
