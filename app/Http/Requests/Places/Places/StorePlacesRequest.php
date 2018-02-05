<?php

namespace Genusshaus\Http\Requests\Places\Places;

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
/*            'region_id' => 'required|exists:regions,id',*/
            'name' => 'required',
            'uploadcare' => 'required|url',
        ];
    }
}
