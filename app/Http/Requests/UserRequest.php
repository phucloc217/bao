<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'ngaysinh' => 'date',
            'email' => 'required|unique:users|email'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập họ tên',
            'ngaysinh.date' => 'Sai định dạng ngày sinh',
            'email.required' => 'Vui lòng nhập Email',
            'email.email' => 'Sai định dạng Email',
            'email.unique'=>'Email đã tồn tại'
        ];
    }
}