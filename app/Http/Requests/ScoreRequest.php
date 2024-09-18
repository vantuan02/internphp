<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScoreRequest extends FormRequest
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
        $rules = [
            'subjects' => 'required|array|present',
            'subjects.*' => 'required|exists:subjects,id',
            'scores' => 'required|array|present',
            'scores.*' => 'required|numeric|min:0|max:100',
        ];
        return $rules;
    }
}
