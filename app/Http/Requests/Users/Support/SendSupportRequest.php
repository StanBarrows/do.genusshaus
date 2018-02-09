<?php

namespace Genusshaus\Http\Requests\Users\Support;

use Illuminate\Foundation\Http\FormRequest;

class SendSupportRequest extends FormRequest
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
            'place_id'  => 'required|exists:places,id',
            'body' => 'required|max:5000',
        ];
    }
}
