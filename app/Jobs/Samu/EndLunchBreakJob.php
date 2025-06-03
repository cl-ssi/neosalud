<?php

namespace App\Jobs\Samu;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Samu\MobileInService;

class EndLunchBreakJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mobileInServiceId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mobileInServiceId)
    {
        $this->mobileInServiceId = $mobileInServiceId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mis = MobileInService::find($this->mobileInServiceId);
        
        if($mis && $mis->lunch_start_at && is_null($mis->lunch_end_at)) {
            if(is_null($mis->lunch_break_start_at) && is_null($mis->lunch_break_end_at)) {
                $mis->lunch_end_at = now();
                $mis->save();
            }
        }
    }
}
