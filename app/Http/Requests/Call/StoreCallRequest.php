<?php

namespace App\Http\Requests\Call;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCallRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'applicant'         => 'nullable|string|min:0|max:255',
            'year'              => 'nullable|integer|min:0|max:150',
            'month'             => 'nullable|integer|min:0|max:11',
            'telephone'         => 'nullable|string',
            'reason'            => 'nullable|string|min:0|max:255',
            'police_intervention'=> 'nullable|boolean',
            'information'       => 'required|string|min:3|max:5000',
            'commune_id'        => 'nullable|exists:communes,id',
            'address'           => 'nullable|string|min:0|max:255',
            'address_reference' => 'nullable|string|min:0|max:255',
            'latitude'          => 'nullable|numeric|min:-90.00000000|max:90.00000000',
            'longitude'         => 'nullable|numeric|min:-180.00000000|max:180.00000000',
            'sex' => [
                'nullable',
                Rule::in(['MALE', 'FEMALE', 'UNKNOWN', 'OTHER']),
            ],
        ];
    }
}
