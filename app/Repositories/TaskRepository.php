<?php
namespace App\Repositories;
use App\Models\Task;

class TaskRepository
{
    public function getAllTasks(): array
    {
        return Task::with("status")->get()->toArray();
    }

    public function deleteTask(Task $task): void
    {
        $task->delete();
    }
}

