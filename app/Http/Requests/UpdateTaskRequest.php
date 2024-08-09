<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [];
        $rules['taskId'] = ['required', 'exists:tasks,id'];
        if ($this->has('title')) {
            $rules['title'] = ['required', 'max:100', 'min:5'];
        }
        if ($this->has('description')) {
            $rules['description'] = ['required', 'max:100', 'min:10'];
        }
        if ($this->has('status')) {
            $rules['status'] = ['required', 'max:100', 'min:5'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Please fill in the title field.',
            'description.required' => 'Please fill in the description field.',
            'status.required' => 'Please fill in the status field.',
            'title.max' => 'title must be a maximum of 100 characters.',
            'title.min' => 'title must be at least 5 characters.',

            'description.max' => 'description must be a maximum of 100 characters.',
            'description.min' => 'description must be at least 10 characters.',

            'status.max' => 'status must be a maximum of 100 characters.',
            'status.min' => 'status must be at least 5 characters.',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @throws AuthorizationException
     */
    public function authorize(): bool
    {
        $taskId = $this->input('taskId');

        $task = Task::query()->findOrFail($taskId);

        if ($this->user()->cannot('update', $task)) {
            throw new AuthorizationException('You do not have permission to update this task.');
        }

        return true;
    }
}
