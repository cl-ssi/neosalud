<?php

namespace App\Http\Requests\Shift;

use App\Rules\NextShift;
use App\Rules\PreviousShift;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateShiftRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'type'          => 'required',
            'opening_at'    => [
                'required',
                'date_format:Y-m-d\TH:i',
                new PreviousShift($request)
            ],
            'closing_at'    => [
                'nullable',
                'date_format:Y-m-d\TH:i',
                'after:opening_at',
                new NextShift($request)
            ],
            'observation'   => 'nullable|min:0|max:5000',
            'status'        => 'nullable'
        ];
    }
}
