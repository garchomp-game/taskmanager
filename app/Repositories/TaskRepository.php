<?php
namespace App\Repositories;
use App\Models\Task;
use App\Models\TaskStatus;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskRepository
{
    public function getAllTasks(Request $request): LengthAwarePaginator
    {
        $sort = $request->input('sort');
        $order = $request->input('order') ?? "desc";
        if($sort == null || $sort == "default") {
            return Task::with("status")
                ->orderBy("created_at", $order)
                ->paginate();
        } else {
            return Task::with("status")
                ->orderBy($sort, $order)
                ->paginate();
        }
    }

    public function deleteTask(Task $task): void
    {
        $task->delete();
    }
    /**
     * @return array
     */
    public function getTaskStatusList(): array
    {
        return TaskStatus::all()->toArray();
    }
}

