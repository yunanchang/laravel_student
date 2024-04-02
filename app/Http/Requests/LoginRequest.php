<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user'=>'required',
            'pwd'=>'required',
            'code'=>'required|captcha'
        ];
    }

    public function messages()
    {
        return[
            'user.required' => '名字不能為空',
            'pw.required' => '名字不能為空',
            'code.required' => '驗證碼錯誤'
        ];
    }
}
