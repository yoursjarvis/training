<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:3', 'max:100'],
            'last_name'  => ['required', 'string', 'min:3', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Please enter a first name.',
            'first_name.min' => 'Your first name is too short.',
            'first_name.max' => 'Your first name is too long.',
        ];
    }
}
