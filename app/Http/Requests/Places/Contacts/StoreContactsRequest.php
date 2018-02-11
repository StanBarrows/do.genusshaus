<?php

namespace Genusshaus\Http\Requests\Places\Contacts;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactsRequest extends FormRequest
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
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'web'       => 'nullable|url|max:255',
            'phone'     => 'nullable|string|max:255',
            'facebook'  => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'twitter'   => 'nullable|string|max:255',
        ];
    }
}
