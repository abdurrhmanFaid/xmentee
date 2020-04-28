<?php

namespace App\Http\Requests\Profiles;

use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:25',
            'email' => 'required|string|email|unique:users,email,'. $this->user()->id,
            'password' => 'sometimes|nullable|string|min:6|max:255|confirmed',
            'username' => 'required|string|max:30|unique:users,username,'.$this->user()->id,
            'image_path' => 'sometimes|nullable|url|string',
            'gender' => 'nullable|string|in:male,female',
            'default_locale' => 'required|string|in:ar,en',
            'messaging_id' => 'nullable|string|max:120',
            'phone_number' => ['nullable', new PhoneNumber],
        ];
    }
}
