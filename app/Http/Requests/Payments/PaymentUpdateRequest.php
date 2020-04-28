<?php

namespace App\Http\Requests\Payments;

use App\Http\Requests\BaseFormRequest;

class PaymentUpdateRequest extends BaseFormRequest
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
            'student_id' => 'required',
            'paid' => 'required_if:student_id,=,all|in:1,0',
        ];
    }
}
