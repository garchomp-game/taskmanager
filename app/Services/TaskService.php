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
    public function getStatusList(): Array
    {
        $taskStatus = $this->taskRepository->getTaskStatusList();
        return compact("taskStatus");
    }
    public function setStoreData(Array $validateData): Array
    {
        $validateData["user_id"] = Auth::user()->id;
        $validateData["team_id"] = Auth::user()->currentTeam->id;
        return $validateData;
    }
}
