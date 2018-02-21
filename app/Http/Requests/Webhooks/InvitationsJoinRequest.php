<?php

namespace Genusshaus\Http\Requests\Webhooks;

use Illuminate\Foundation\Http\FormRequest;

class InvitationsJoinRequest extends FormRequest
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
            'user'  => 'required|exists:users,email',
            'place' => 'required|exists:places,uuid',
        ];
    }
}