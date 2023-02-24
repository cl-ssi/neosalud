<?php

namespace App\Rules\Samu;

use App\Models\Samu\Call;
use Illuminate\Contracts\Validation\Rule;

class CallRegulation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($call_id, $classification, $key)
    {
        $this->call_id = $call_id;
        $this->classification = $classification;
        $this->key = $key;
        $this->msg = '';
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
        if($this->call_id == null)
        {
            if($this->classification == 'OT')
            {
                $pass = ($this->key == null) ? true : false;
                $this->msg = 'Si la llamada es tipo OT no debe ingresar la clave';
            }
            elseif($this->classification == null)
            {
                /**
                 * Se coloca $pass = true para poder desclasificar una llamada
                 */
                $pass = true;
                $this->msg = 'Por favor clasifique la llamada';
            }
            else
            {
                $pass = ($this->key != null) ? true : false;
            }
        }
        else
        {
            $pass = ($this->classification == null && $this->key == null) ? true : false;
            $this->msg = 'Si la llamada hace referencia a otra, no debe clasificarla ni seleccionar clave';
        }
        return $pass;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->msg;
    }
}
