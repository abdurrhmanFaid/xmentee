<?php

namespace App\Http\Requests\Posts;

use Illuminate\Validation\Rule;
use App\Http\Requests\BaseFormRequest;

class PostStoreRequest extends BaseFormRequest
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
            'title' => 'required|string|max:80',
            'category_id' => [
                'required',
                'numeric',
                Rule::exists('categories', 'id', function ($query) {
                    $query->where('band_id', $this->user()->band_id);
                })],
            'body' => 'required|string|max:20000',
            'type' => 'required|string|in:question,information,advice,other',
        ];
    }

    /**
     * @return array|void
     */
    public function filters()
    {
        return [
            'title' => 'capitalize|trim|escape',
        ];
    }
}
