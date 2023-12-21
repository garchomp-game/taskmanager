<?php
namespace App\Repositories;
use App\Models\Task;
use App\Models\TaskStatus;

class TaskRepository
{
    public function getAllTasks(): array
    {
        return Task::with("status")
            ->orderBy("created_at", "desc")
            ->get()
            ->toArray();
    }

    public function deleteTask(Task $task): void
    {
        $task->delete();
    }
    public function getTaskStatusList(): array
    {
        return TaskStatus::all()->toArray();
    }
}

