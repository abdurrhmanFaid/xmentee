<?php

namespace App\Http\Requests\Groups;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class GroupStoreRequest extends BaseFormRequest
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
            'batch_id' => ['required', 'numeric', Rule::exists('batches', 'id')->where(function ($query) {
                return $query->where('band_id', $this->user()->band_id);
            })],
            'name' => ['required', 'string', 'max:20', Rule::unique('groups', 'name')->where(function ($query) {
                return $query->where('band_id', $this->user()->band_id);
            })],
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
