<?php

namespace App\Rules;

use App\Models\Samu\Shift;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PreviousShift implements Rule
{
    public $shift;
    public $previousShift;
    public $openingAt;
    public $message;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->openingAt =  Carbon::parse($request->opening_at);

        $this->shift = $request->shift;

        if($this->shift)
        {
            $previousShift = Shift::where('id', '<', $this->shift->id)->max('id');
            $this->previousShift = Shift::find($previousShift);
        }
        else
            $this->previousShift = Shift::latest()->first();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $passes = true;

        if($this->shift && $this->shift->id == 1)
            return $passes;

        if($this->previousShift->closing_at == null)
        {
            $passes = false;
            $this->message = "El turno anterior " . $this->previousShift->id . " no tiene fecha de cierre.";
        }
        elseif($this->previousShift->closing_at->diffInMinutes($this->openingAt) > 60 || $this->previousShift->closing_at->gt($this->openingAt))
        {
            $passes = false;
            $this->message = "No debe existir una diferencia mayor a 60 min. entre la apertura de este turno y el cierre del turno " . $this->previousShift->id;
        }

        return $passes;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
