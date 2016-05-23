<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class shareProdRequest extends Request
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
            'dev'   => 'required',
            'prod'  => 'required',
            'tar'   => 'required'
        ];
    }

    public function messages()
    {
        return [
            'dev.required'   => 'Bad Token Exception',
            'prod.required'  => 'Blank Input Exception',
            'tar.required'   => 'Blank Input Exception'
        ];
    }
}
