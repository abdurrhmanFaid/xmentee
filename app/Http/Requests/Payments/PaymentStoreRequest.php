<?php

namespace App\Http\Requests\Payments;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaymentStoreRequest extends FormRequest
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
            'batch_id' => ['required', 'numeric', Rule::exists('batches', 'id', function ($query) {
                return $query->where('band_id', auth()->user()->band_id);
            })],
            'title' => 'required|string|max:120',
            'description' => 'nullable|string|max:5000',
            'currency' => 'required|string|in:LE,USD',
            'deadline' => 'required|after_or_equal:today',
            'alarm_notification_date' => 'nullable|after:today|before:deadline',
            'std_payment' => 'required|array|min:1',
            'std_payment.*.id' => ['required', 'numeric', Rule::exists('users', 'id', function ($query) {
                return $query->where('batch_id', $this->batch_id);
            })],
            'std_payment.*.payment' => 'required|array',
            'std_payment.*.payment.paid' => 'required|boolean',
            'std_payment.*.payment.paid_at' => 'required_if:std_payment.*.payment.paid,=,true|before_or_equal:today',
            'std_payment.*.payment.value' => 'required|numeric|min:5',
        ];
    }
}
