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
        if($sort == null) {
            $result = Task::with("status")
                ->orderBy("created_at", $order)
                ->paginate();
        return $result;
        } else {
            $result = Task::with("status")
                ->orderBy($sort, $order)
                ->paginate();
        return $result;
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

