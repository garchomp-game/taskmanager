<?php
namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

use function Symfony\Component\String\b;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getToDoListData(String $sort = null): Authenticatable|Null|Array
    {
        $user = Auth::user();
        $tasks = null;
        if($sort == null) {
            $tasks = $this->taskRepository->getAllTasks();
        } else {
            $tasks = $this->taskRepository->getAllTasks($sort);
        }

        return [
            'user' => $user,
            'tasks' => $tasks
        ];
    }
    public function getStatusList(): Array
    {
        $taskStatus = $this->taskRepository->getTaskStatusList();
        return compact("taskStatus");
    }

    public function getTaskEditData(Task $task): Array
    {
        $taskStatus = $this->taskRepository->getTaskStatusList();
        return [
            'taskStatus' => $taskStatus,
            "task" => $task
        ];
    }

    public function setStoreData(Array $validateData): Array
    {
        $validateData["user_id"] = Auth::user()->id;
        $validateData["team_id"] = Auth::user()->currentTeam->id;
        return $validateData;
    }
}
