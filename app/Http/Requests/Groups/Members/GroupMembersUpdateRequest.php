<?php

namespace App\Http\Requests\Groups\Members;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GroupMembersUpdateRequest extends FormRequest
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
//        $group = $this->route('group');

        return [
            'members' => 'required|array',
            'members.*' => [
                'required',
                'numeric',

                // for more performance i will skip checking for ids
//                Rule::exists('users', 'id')->where(function ($query) use ($group) {
//                    return $query->where('band_id', $group->band_id)
//                        ->where('batch_id', $group->batch_id);
//                })
            ]
        ];
    }
}
