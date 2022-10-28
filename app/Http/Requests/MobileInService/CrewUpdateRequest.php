<?php

namespace App\Http\Requests\MobileInService;

use Illuminate\Foundation\Http\FormRequest;

class CrewUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'assumes_at'    => 'required|date_format:Y-m-d\TH:i',
            'leaves_at'     => 'nullable|date_format:Y-m-d\TH:i|after:assumes_at',
        ];
    }

    public function messages()
    {
        return [
            'assumes_at.required'       =>  'El campo asume es obligatorio',
            'assumes_at.date_format'    =>  'El campo asume debe tener un formato dd/mm/aaaa hh:mm aa',
            'leaves_at.date_format'     =>  'El campo se retira debe tener un formato dd/mm/aaaa hh:mm aa',
        ];
    }
}
