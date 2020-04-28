<?php

namespace App\Http\Requests\Groups;

use Illuminate\Validation\Rule;
use App\Http\Requests\BaseFormRequest;

class GroupUpdateRequest extends BaseFormRequest
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
                'required',
                'string',
                'max:20',
                Rule::unique('groups', 'name')
                    ->where(
                        function ($query) {
                            return $query->where('band_id', $this->user()->band_id);
                        })
                    ->ignore(
                        $this->route('group')->id
                    )],
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
