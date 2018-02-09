<?php

namespace Genusshaus\Http\Requests\Places\Posts;

use Illuminate\Foundation\Http\FormRequest;

class StorePostsRequest extends FormRequest
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
            'title'        => 'required|string|max:60',
            'teaser'        => 'required|string|max:255',
            'body'        => 'required|string|max:5000',
            'author'        => 'required|string|max:255',
            'src'        => 'required|string|max:255',
            'uploadcare'  => 'required|url',
        ];
    }
}
