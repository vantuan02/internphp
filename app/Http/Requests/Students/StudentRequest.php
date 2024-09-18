<?php

namespace App\Http\Requests\Students;

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
            'student_code'=>'required|max:10',
            'image'=>'required',
            'birthday'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'status'=>'required',
            'department_id'=>'required',
            'name'=>'required|max:50',
            'email'=>'required|email|unique:users,email|max:100',
            'password'=>'required|min:8',
        ];
    }
}
