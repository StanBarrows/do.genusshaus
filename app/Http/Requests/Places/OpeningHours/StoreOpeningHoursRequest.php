<?php

namespace Genusshaus\Http\Requests\Places\OpeningHours;

use Illuminate\Foundation\Http\FormRequest;

class StoreOpeningHoursRequest extends FormRequest
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
            'weekday' => 'required|integer|between:1,7',
            'open' => 'required|date_format:H:i',
            'close' => 'required|date_format:H:i|after:open'
        ];
    }
}
