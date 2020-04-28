<?php

namespace App\Http\Requests\Posts;

use App\Http\Requests\BaseFormRequest;

class PostIndexRequest extends BaseFormRequest
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
            'categories' => 'required|array',
            'types' => 'required|array',
            'by' => 'nullable',
        ];
    }
}
