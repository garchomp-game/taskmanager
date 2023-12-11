<?php
namespace App\Services;
use App\Repositories\TaskRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getToDoListData(): Authenticatable|Null|Array
    {
        $user = Auth::user();
        $tasks = $this->taskRepository->getAllTasks();

        return [
            'user' => $user,
            'tasks' => $tasks
        ];
    }
}
