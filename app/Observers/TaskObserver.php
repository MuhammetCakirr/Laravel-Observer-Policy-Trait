<?php

namespace App\Observers;

use App\Models\Task;
use App\Models\TaskHistory;

class TaskObserver
{
    /**
     * Handle the Task "created" event.
     */
    public function created(Task $task): void
    {
        TaskHistory::query()->create(
            [
                'task_id' => $task->getId(),
                'user_id' => request()->user()->id,
                'action' => 'Task created.',
                'detail' => 'A task was created.',
            ]
        );
    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {

        $original = $task->getOriginal();
        $changes = $task->getChanges();

        $updatedFields = [];

        foreach ($changes as $key => $value) {
            if (array_key_exists($key, $original) && $original[$key] != $value) {
                $updatedFields[] = "{$key} changed from '{$original[$key]}' to '{$value}'";
            }
        }

        $details = implode(', ', $updatedFields);

        TaskHistory::query()->create([
            'task_id' => $task->getId(),
            'user_id' => request()->user()->id,
            'action' => 'Task updated',
            'detail' => $details,
        ]);
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        $userId = request()->user()->id;

        TaskHistory::query()->create([
            'task_id' => $task->getId(),
            'user_id' => $userId,
            'action' => 'Task deleted',
            'detail' => 'A task was deleted',
        ]);
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        $userId = request()->user()->id;
        TaskHistory::query()->create([
            'task_id' => $task->getId(),
            'user_id' => $userId,
            'action' => 'Task restored',
            'details' => 'A task was restored',
        ]);
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        $userId = request()->user()->id;

        TaskHistory::query()->create([
            'task_id' => $task->getId(),
            'user_id' => $userId,
            'action' => 'Task force deleted',
            'details' => 'A task was force deleted',
        ]);
    }
}
