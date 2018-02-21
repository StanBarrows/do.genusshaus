<?php

namespace Genusshaus\Http\Requests\Ressources\iOS;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchPlacesRequest extends FormRequest
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
            'device_uuid' => 'required|exists:devices,uuid',
            'opening_hour' => 'required',
            'tags' => 'required',
        ];
    }
}
