<?php

namespace Genusshaus\Http\Requests\Moderators\Places\Beacons;

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
            'estimote_id' => 'required|string|max:255',
            'major'    => 'required|numeric|max:5000',
            'minor'    => 'required|numeric|max:5000',
        ];
    }
}
