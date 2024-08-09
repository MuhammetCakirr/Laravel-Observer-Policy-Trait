<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\DeleteTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Repositoreis\TaskRepository;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    public function create(CreateTaskRequest $request): JsonResponse
    {
        $validatedData = collect($request->validated());

        $repository = new TaskRepository;

        $task = $repository->create($validatedData->get('title'), $validatedData->get('description'), $request->user()->id);

        return $task->successResponse($task, 'Task was successfully created.');

    }

    public function update(UpdateTaskRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        $service = new TaskService;

        $task = $service->update($validatedData);

        return $task->successResponse($task, 'Task was successfully updated.');
    }

    public function delete(DeleteTaskRequest $request): JsonResponse
    {
        $taskId = $request->input('taskId');

        $repository = new TaskRepository;

        $task = $repository->delete((int) $taskId);

        return $task->successResponse($task, 'Task was successfully deleted.');
    }
}
