<?php

namespace Genusshaus\Http\Requests\Moderators\Beacons;

use Illuminate\Foundation\Http\FormRequest;

class StoreBeaconsRequest extends FormRequest
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
            'place_id' => 'required|exists:places,id',
            'major'  => 'required|numeric',
            'minor' => 'required|numeric',
        ];
    }
}
