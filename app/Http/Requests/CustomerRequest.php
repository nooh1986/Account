<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name'     => 'required|unique:customers,name,' .$this->id,
            'email'    => 'required|email|unique:customers,email,' .$this->id,
            'phone'    => 'required|numeric|unique:customers,phone,' .$this->id,
            'address'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'The :attribute هذا الحقل مطلوب.',
            'name.unique'       => 'The :attribute هذا الاسم تم استخدامه مسبقا.',
            'email.required'    => 'The :attribute هذا الحقل مطلوب.',
            'email.unique'      => 'The :attribute هذا الاسم تم استخدامه مسبقا.',
            'email.email'       => 'The :attribute  يجب ان يكون البريد الالكتروني صالح .',
            'address.required'  => 'The :attribute هذا الحقل مطلوب.',
            'phone.required'    => 'The :attribute هذا الحقل مطلوب.',
            'phone.unique'      => 'The :attribute هذا الاسم تم استخدامه مسبقا.',
            'phone.numeric'     => 'The :attribute يجب ان يكون رقم الهاتف صالح.',
        ];
    }
}
