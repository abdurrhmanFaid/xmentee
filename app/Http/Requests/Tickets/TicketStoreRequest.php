<?php

namespace App\Http\Requests\Tickets;

use Illuminate\Validation\Rule;
use App\Http\Requests\BaseFormRequest;

class TicketStoreRequest extends BaseFormRequest
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
            'owner_name' => 'required|string|max:25|min:3',
            'password' => 'required|min:3|max:20',
            'band_id' => ['required', 'numeric', Rule::exists('bands', 'id')->where(function ($query) {
                 $query->where('student_reception_open', true);
            })],
        ];
    }

    public function filters()
    {
        return [
            'owner_name' => 'trim|capitalize|escape',
        ];
    }

    public function messages()
    {
        return [
            'owner_name.max' => __('tickets.long_name'),
        ];
    }
}
