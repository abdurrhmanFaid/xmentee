<?php

namespace App\Http\Requests\Bands;

use Illuminate\Validation\Rule;
use App\Http\Requests\BaseFormRequest;

class BandUpdateRequest extends BaseFormRequest
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
     * Get data to be validated from the request.
     *
     * @return array
     */
    public function validationData()
    {
        $this->merge([
            'applying_deadline' => \Carbon\Carbon::parse($this->applying_deadline)->format('Y-m-d H:i:s')
        ]);

        return $this->all();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:25|unique:bands,name,'.$this->user()->band_id,
            'description' => 'required|string|max:255',
            'address' => 'required|string|max:120',
            'applying_deadline' => 'required|after_or_equal:today',
            'members_count' => 'required|numeric|min:1|max:100',
            'student_reception_open' => 'required|in:1,0',
            'receiving_batch_id' => ['nullable', 'numeric', Rule::exists('batches', 'id', function ($query) {
                return $query->where('band_id', $this->user()->band_id);
            })],
            'notifications_locale' => 'required|string|in:en,ar',
        ];
    }
}
