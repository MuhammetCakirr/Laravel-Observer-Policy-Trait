<?php

namespace App\Repositoreis;

use App\Models\Task;

class TaskRepository
{
    public function create(string $title, string $description, int $userId): Task
    {
        return Task::query()->create(
            [
                'title' => $title,
                'description' => $description,
                'user_id' => $userId,
                'status' => 'not completed',
            ]
        );
    }

    public function update(int $taskId, array $updatedData): Task
    {
        $task = Task::query()->find($taskId);
        $task->update($updatedData);

        return $task;

    }

    public function delete(int $taskId): Task
    {
        $task = Task::query()->find($taskId);
        $task->delete();

        return $task;
    }
}
