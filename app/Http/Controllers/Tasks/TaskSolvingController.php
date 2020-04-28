<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\TaskSolveRequest;
use App\Models\Task;
use App\Models\User;

class TaskSolvingController extends Controller
{
    public function show(Task $task)
    {
        $this->authorize('solve', $task);

        return view('tasks.solving.show', compact('task'));
    }

    public function store(Task $task, TaskSolveRequest $request)
    {
        $this->authorize('solve', $task);

        if(($taskable = $task->x(auth()->user())) instanceof User) {
            $task->users()->where('taskable_id', auth()->id())->update(['solution' => $request->solution, 'status' => 'submitted']);
        } else {
            $task->groups()->where('taskable_id', $taskable->id)->update(['solution' => $request->solution, 'status' => 'submitted']);
        }
    }
}
