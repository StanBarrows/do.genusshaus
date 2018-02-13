<?php

namespace Genusshaus\Http\Requests\Places\Events;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreEventsRequest extends FormRequest
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
            'name'        => 'required|string|max:60',
            'description' => 'required|string|max:1500',
            'start'       => 'required|date_format:Y-m-d H:i:s|after:'.Carbon::now(),
            'uploadcare'  => 'required|url',
        ];
    }
}
