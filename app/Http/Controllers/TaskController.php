<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    private $taskService;
    public function __construct(TaskService $taskService) {
        $this->taskService = $taskService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render(
            'Dashboard',
            $this->taskService->getToDoListData()
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render(
            "Task/Create",
            $this->taskService->getStatusList()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $validatedData = $request->validate(Task::validationRules());
        Task::create(
            $this->taskService->setStoreData($validatedData)
        );

        return redirect()->route("tasks.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): Response
    {
        return Inertia::render("Task/Show", ["task" => $task->load("status")]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): Response
    {
        //
        return Inertia::render(
            "Task/Edit",
            $this->taskService->getTaskEditData($task)
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validatedData = $request->validate(Task::validationRules());
        $task = Task::find($id);
        $task->save(
            $this->taskService->setStoreData($validatedData)
        );

        return redirect()->route("tasks.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): JsonResponse
    {
        if($task->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Task successfully deleted']);
        }
        return response()->json(['status' => 'error', 'message' => 'Task deletion failed'], 500);
    }
}
