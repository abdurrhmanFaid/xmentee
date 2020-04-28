<?php

namespace App\Http\Requests\Bands;

use Illuminate\Foundation\Http\FormRequest;

class RequestBandRequest extends FormRequest
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
            'band_name' => 'required|string|max:20|unique:bands,name',
            'band_description' => 'required|string|max:10000',
            'owner_email' => 'required|email|max:255|string|unique:users,email',
            'members_count' => 'required|numeric|min:1|max:100',
        ];
    }
}
