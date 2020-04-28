<?php

namespace App\Http\Requests\Posts;

use App\Http\Requests\BaseFormRequest;

class PostRateStoreRequest extends BaseFormRequest
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
        $rateConf = site('rate_system');

        return [
            'rate' => ['required', 'numeric', 'min:' . $rateConf['min_rate'], 'max:' . $rateConf['max_rate']],
        ];
    }
}
