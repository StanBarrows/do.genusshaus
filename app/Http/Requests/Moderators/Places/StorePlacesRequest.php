<?php

namespace Genusshaus\Http\Requests\Moderators\Places;

use Illuminate\Foundation\Http\FormRequest;

class StorePlacesRequest extends FormRequest
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
            'region_id' => 'required|exists:regions,id',
            'name'  => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ];
    }
}
