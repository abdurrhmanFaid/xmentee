<?php

namespace App\Http\Requests\Categories;

use Illuminate\Validation\Rule;
use App\Http\Requests\BaseFormRequest;

class CategoryStoreRequest extends BaseFormRequest
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
            'name' => [
                'required', 'string', 'min:2', 'max:20',
                Rule::unique('categories', 'name')->where(function ($query) {
                    $query->where('band_id', $this->user()->band_id);
                })
            ],
            'description' => 'nullable|string|max:255',
        ];
    }

    /**
     * @return array|void
     */
    public function filters()
    {
        return [
            'name' => 'trim|capitalize|escape',
            'description' => 'trim|escape',
        ];
    }
}
