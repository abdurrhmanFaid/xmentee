<?php

namespace App\Http\Requests\Lessons;

use Illuminate\Validation\Rule;
use App\Http\Requests\BaseFormRequest;

class LessonStoreRequest extends BaseFormRequest
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
            'description' => 'sometimes|nullable|max:20000',
            'video_path' => 'required|url',
            'category_id' => ['required', 'numeric', Rule::exists('categories', 'id', function ($query) {
                return $query->band_id == $this->user()->band_id;
            })],
            'batch_id' => ['required', 'numeric', Rule::exists('batches', 'id', function ($query) {
                return $query->band_id == $this->user()->band_id;
            })],
            'instructors' => ['required', 'array', 'min:1'],
            'instructors.*' => ['required', 'numeric', Rule::exists('band_owner', 'owner_id', function ($query) {
                return $query->where('band_id', $this->user()->band_id);
            })],
        ];
    }

    public function filters()
    {
        return [
            'title' => 'trim|capitalize',
            'description' => 'trim',
        ];
    }
}
