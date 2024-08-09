<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:100', 'min:5'],
            'description' => ['required', 'max:100', 'min:10'],
            'status' => ['required', 'max:100', 'min:5'],

        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Please fill in the title field.',
            'description.required' => 'Please fill in the description field.',
            'status.required' => 'Please fill in the status field.',
            'title.max' => 'Password must be a maximum of 100 characters.',
            'title.min' => 'Password must be at least 5 characters.',

            'description.max' => 'Password must be a maximum of 100 characters.',
            'description.min' => 'Password must be at least 10 characters.',

            'status.max' => 'Password must be a maximum of 100 characters.',
            'status.min' => 'Password must be at least 5 characters.',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create');
    }
}
