<?php
namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getToDoListData(Request $request): Authenticatable|Null|Array
    {
        $user = Auth::user();
        $tasks = $this->taskRepository->getAllTasks($request);

        return [
            'user' => $user,
            'tasks' => $tasks,
            'sort' => $request->input('sort'),
            'order' => $request->input('order'),
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
