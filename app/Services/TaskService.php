<?php

namespace App\Services;

use App\Models\Task;
use App\Repositoreis\TaskRepository;

class TaskService
{
    public function update(array $validatedData): Task
    {
        $taskId = $validatedData['taskId'];

        unset($validatedData['taskId']);

        $repository = new TaskRepository;

        return $repository->update((int) $taskId, $validatedData);
    }
}
