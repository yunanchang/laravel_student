<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => 'required|between:2,10',
            'sex' => 'required',
            'age' => 'required|integer|between:1,150',
            'birthday' => 'required|date',
            'm_id' => 'required|integer',
            'logo'=>'file|image|max:200'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名字不能為空',
            'sex.required' => 'sex不能為空',
            'age.required' => 'age不能為空',
            'age.between' => 'age在1到150之間',
            'birthday.required' => 'birthday不能為空',
            'm_id.required' => 'm_id不能為空',
        ];
    }
}
