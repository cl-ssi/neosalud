<?php

namespace App\Http\Requests\Shift;

use App\Models\Samu\Shift;
use Illuminate\Foundation\Http\FormRequest;

class UpdateShiftUserRequest extends FormRequest
{
    public $shift;

    public function __construct(Shift $shift)
    {
        $this->shift = $shift;
    }

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
            'assumes_at'    => 'required|date_format:Y-m-d\TH:i|after_or_equal:' . $this->shift->opening_at,
            'leaves_at'     => 'nullable|date_format:Y-m-d\TH:i|after:assumes_at'
        ];
    }
}
