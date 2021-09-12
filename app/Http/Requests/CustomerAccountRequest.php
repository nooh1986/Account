<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerAccountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'box_id'      => 'required',
            'type'        => 'required',
            'customer_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'box_id.required'     => 'The :attribute هذا الحقل مطلوب.',
            'type.required'       => 'The :attribute هذا الحقل مطلوب.',
            'customer_id.required'=> 'The :attribute هذا الحقل مطلوب.'
        ];
    }
}
