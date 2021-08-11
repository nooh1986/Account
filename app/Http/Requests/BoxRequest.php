<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoxRequest extends FormRequest
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
            'name'  => 'required|unique:boxes,name,' .$this->id,
            'code'  => 'required|unique:boxes,code,' .$this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'The :attribute هذا الحقل مطلوب.',
            'name.unique'    => 'The :attribute هذا الاسم تم استخدامه مسبقا.',
            'code.required'  => 'The :attribute هذا الحقل مطلوب.',
            'code.unique'    => 'The :attribute هذا الاسم تم استخدامه مسبقا.',
        ];
    }
}
