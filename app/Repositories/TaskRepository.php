<?php
namespace App\Repositories;
use App\Models\Task;
use App\Models\TaskStatus;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskRepository
{
    public function getAllTasks(): LengthAwarePaginator
    {
        return Task::with("status")
            ->orderBy("created_at", "desc")
            ->paginate();
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

