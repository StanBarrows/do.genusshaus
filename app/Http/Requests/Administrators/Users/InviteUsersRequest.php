<?php

namespace Genusshaus\Http\Requests\Administrators\Users;

use Illuminate\Foundation\Http\FormRequest;

class InviteUsersRequest extends FormRequest
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
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'roles' => 'required|array|exists:roles,id',
        ];
    }
}