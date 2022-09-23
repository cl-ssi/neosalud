<?php

namespace App\Rules;

use App\Models\Samu\Shift;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NextShift implements Rule
{
    public $shift;
    public $nextShift;
    public $closingAt;
    public $message;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->closingAt =  Carbon::parse($request->closing_at);

        $this->shift = $request->shift;

        $nextShift = Shift::where('id', '>', $this->shift->id)->min('id');
        $this->nextShift = Shift::find($nextShift);
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
        $lastShift = Shift::latest()->first();
        $passes = true;

        if($this->shift->id == $lastShift->id)
        {
            return $passes;
        }

        if($this->nextShift->opening_at == null)
        {
            $passes = false;
            $this->message = "El turno siguiente " . $this->nextShift->id . " no tiene fecha de apertura.";
        }

        if($this->nextShift->opening_at->diffInMinutes($this->closingAt) > 60 || $this->closingAt->gt($this->nextShift->opening_at))
        {
            $passes = false;
            $this->message = "No debe existir una diferencia mayor a 60 min. entre el cierre de este turno y la apertura del turno " . $this->nextShift->id;
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
