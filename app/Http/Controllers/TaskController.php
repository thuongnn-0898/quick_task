<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Auth;

class TaskController extends Controller
{
    protected $task;

    public function __construct(TaskRepository $task)
    {
        $this->middleware('auth');
        $this->task = $task;
    }

    public function index()
    {
        $tasks = $this->task->forUser();
        return view('tasks.index', compact('tasks'));
    }

    public function store(TaskRequest $rq)
    {

        $rq->user()->tasks()->create([
            'name' => $rq->name,
        ]);

        return redirect('/task');
    }

    public function destroy(Task $task)
    {
        $this->authorize('destroy', $task);
        if($task->delete()){
            $status = true;
            $msg = trans('task.destroy.success');
        }else{
            $status = false;
            $msg = trans('task.destroy.fail');
        }
        return json_encode(['status' => $status, 'msg' => $msg]);
    }
}
