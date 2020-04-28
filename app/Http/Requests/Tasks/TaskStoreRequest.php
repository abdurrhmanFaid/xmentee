<?php

namespace App\Http\Requests\Tasks;

use App\Http\Requests\BaseFormRequest;

class TaskStoreRequest extends BaseFormRequest
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
            'title' => 'required|string|string|max:255',
            'body' => 'required|string|max:20000',
            'notice' => 'nullable|string|max:255',
            'start_date' => 'required|string|date',
            'end_date' => 'nullable|string|date',
        ];
    }

    public function filters()
    {
        return [
            'title' => 'capitalize|'
        ];
    }
}
