<?php

namespace App\Http\Requests\Tickets\Unrequested;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class TicketUpdateRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->has('type') && in_array($this->type, ['student', 'instructor']);
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        session()->flash('type', $this->type);

        throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->type == 'student') {
            return array_merge($this->instructorTicketRules(), $this->studentTicketRules());
        } else {
            return $this->instructorTicketRules();
        }
    }

    /**
     * @return array
     */
    protected function studentTicketRules()
    {
        return [
            'unlimited_usage' => 'required|numeric|in:0,1',
            'usage_limit' => 'required_if:unlimited_usage,0|min:0|max:999999',
        ];
    }

    /**
     * @return array
     */
    protected function instructorTicketRules()
    {
        return [
            'code' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ];
    }

    public function filters()
    {
        return [
            'code' => 'trim|escape',
            'password' => 'trim|escape',
        ];
    }
}
