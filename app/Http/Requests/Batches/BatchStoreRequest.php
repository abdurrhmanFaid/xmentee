<?php

namespace App\Http\Requests\Batches;

use Illuminate\Validation\Rule;
use App\Http\Requests\BaseFormRequest;

class BatchStoreRequest extends BaseFormRequest
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
                Rule::notIn($this->user()->band->batches->pluck('name')->toArray())
            ],
            'paid' => 'required|boolean',
            'default_paying_amount' => $this->checkPaymentStatus()
        ];
    }

    /**
     * @return string
     */
    protected function checkPaymentStatus()
    {
        if($this->paid) {
            return 'required|numeric|min:5';
        }

        return 'required|numeric|min:0|max:0';
    }

    public function filters()
    {
        return [
            'name' => 'trim|capitalize|escape',
        ];
    }
}
