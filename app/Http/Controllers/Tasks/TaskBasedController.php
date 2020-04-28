<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Requests\Tasks\TaskAssignRequest;

class TaskBasedController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function show(Task $task)
    {
        return view('tasks.based.show', compact('task'));
    }

    public function store(Task $task, TaskAssignRequest $request)
    {
        foreach($request->validated()['data'] as $item) {
            if($item['taskable_type'] == 'group') {
                $task->groups()->syncWithoutDetaching($item['taskable_id']);
            }else {
                $task->users()->syncWithoutDetaching($item['taskable_id']);
            }
        }

        foreach($task->users as $user) {

        }

        foreach ($task->groups as $group) {

        }
    }
}
