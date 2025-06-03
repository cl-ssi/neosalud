<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use App\Jobs\EndLunchBreakJob;

class Lunch extends Component
{
    public $mis;
    public $lunch_start;
    public $lunch_end;

    public function lunchStart()
    {
        $this->mis->lunch_start_at = now();
        $this->mis->save();
        $this->mis->fresh();
        EndLunchBreakJob::dispatch($this->mis->id)
            ->delay(now()->addMinutes(45));
    }

    public function lunchEnd()
    {
        $this->mis->lunch_end_at = now();
        $this->mis->save();
        $this->mis->fresh();
    }

    public function lunchBreakStart()
    {
        $this->mis->lunch_break_start_at = now();
        $this->mis->save();
        $this->mis->fresh();
        
    }

    public function lunchBreakEnd()
    {
        $this->mis->lunch_break_end_at = now();
        $this->mis->save();
        $this->mis->fresh();
    }

    public function render()
    {
        return view('livewire.samu.lunch');
    }
}
