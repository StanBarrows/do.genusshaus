<?php

namespace Genusshaus\Http\Requests\Supporters;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StartImpersonateRequest extends FormRequest
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
            'email' => [
                'required', 'email', Rule::exists('users', 'email')->where(function ($builder) {
                    return $builder->where('email', '!=', $this->user()->email);
                }),
            ],
        ];
    }
}
