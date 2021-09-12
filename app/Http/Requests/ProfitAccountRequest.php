<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfitAccountRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'box_id'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'box_id.required'=> 'The :attribute هذا الحقل مطلوب.',
        ];
    }
}
