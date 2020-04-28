<?php

namespace App\Http\Requests\Tasks;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskAssignRequest extends FormRequest
{
    protected $table;

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
            'data' => 'required|array|min:1',
            'data.*.taskable_type' => ['required', 'string', 'in:group,student',function($attribute, $value, $fail) {
                $this->table = $value == 'student' ? 'users' : 'groups';
            }],
            'data.*.taskable_id' => ['required', 'numeric', $this->validId()]
        ];
    }

    protected function validId() {
        Rule::exists($this->data[0]['taskable_type']. "s", 'id', function ($query) {
            return $query->where('band_id', $this->user()->id);
        } );

        Rule::unique('taskables', 'taskable_id', function ($query) {
            $query->where('taskable_type', 'App\Models\User')->where('task_id', $this->route('task')->id);
        });
    }
}
