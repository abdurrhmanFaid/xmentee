<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\TaskStoreRequest;
use App\Models\Band;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('tasks.index');
    }

    public function create()
    {
        $this->authorize('view', new Band());
        return view('tasks.create');
    }

    public function store(TaskStoreRequest $request)
    {

        $task = Task::create([
            'title' => $request['title'],
            'body' => $request['body'],
            'notice' => $request['notice'],
            'start_date' => \Carbon\Carbon::parse(request('start_date'))->format('Y-m-d H:i'),
            'end_date' => \Carbon\Carbon::parse(request('end_date'))->format('Y-m-d H:i'),
            'creator_id' => auth()->id(),
        ]);

        return redirect()->route('task-based.show', $task->id);
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }
}
