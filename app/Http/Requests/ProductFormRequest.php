<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductFormRequest extends Request
{
    public function wantsJson()
    {
        return false;
    }
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
            'prodName'      => 'required',
            'prodPrice'     => 'required|integer',
            'prodDetailUrl' => 'required|url',
        ];
    }

    public function messages()
    {
        return [
            'prodName.required'         => 'The product name field is required.',
            'prodPrice.required'        => 'The product price field is required.',
            'prodPrice.integer'         => 'The product price must be an integer.',
            'prodDetailUrl.required'    => 'The product detail url field is required.',
        ];
    }
}
