<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

class DeleteTaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'taskId' => ['required', 'exists:tasks,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'taskId.exists' => 'This task Id is not exists.',
            'taskId.required' => 'Task Id is required.',
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
            throw new AuthorizationException('You do not have permission to delete this task.');
        }

        return true;
    }
}
