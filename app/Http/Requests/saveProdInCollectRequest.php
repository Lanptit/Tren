<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class saveProdInCollectRequest extends Request
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
            'dev'       => 'required',
            'prod'      => 'required', 
            'colname'   => 'required'
        ];
    }

    public function messages()
    {
        return [
            'dev.required'      => 'Bad Token Exception',
            'prod.required'     => 'Blank Input Exception',
            'colname.required'  => 'Blank Input Exception'
        ];
    }
}
