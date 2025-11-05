<?php

namespace App\Observers\Samu;

use App\Models\Commune;
use App\Models\Samu\Call;
use App\Models\Samu\Shift;
use App\Services\GeocodingService;

class CallObserver
{
    /**
     * Handle the Call "creating" event.
     *
     * @param  \App\Models\Call  $call
     * @return void
     */
    public function creating(Call $call)
    {
        if ($call->commune) {
            if ($call->commune->latitude == $call->latitude && $call->commune->longitude == $call->longitude) {
                $call->latitude = null;
                $call->longitude = null;
            }
        }

        $call->receptor()->associate(auth()->user());
        $call->shift()->associate(Shift::whereStatus(true)->first());
        $call->hour = now();
    }

    /**
     * Handle the Call "created" event.
     *
     * @param  \App\Models\Call  $call
     * @return void
     */
    public function created(Call $call): void
    {
        if ($call->latitude == null || $call->longitude == null) {
            if ($call->address != null && $call->commune?->name != null) {
                $geocodingService = app(GeocodingService::class);
                $coordinates = $geocodingService->getCoordinates($call->address . '+' . $call->commune->name);
                $call->latitude = $coordinates['lat'] ?? null;
                $call->longitude = $coordinates['lng'] ?? null;
                $call->saveQuietly();
            }
        }
    }

    /**
     * Handle the Call "updating" event.
     *
     * @param  \App\Models\Call  $call
     * @return void
     */
    public function updating(Call $call)
    {
        if ($call->commune) {
            if ($call->commune->latitude == $call->latitude && $call->commune->longitude == $call->longitude) {
                $call->latitude = null;
                $call->longitude = null;
            }
        }
    }
}
