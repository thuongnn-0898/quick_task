<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Auth;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Auth::user()->tasks;
        return view('tasks.index', compact('tasks'));
    }

    public function store(TaskRequest $rq)
    {

        $rq->user()->tasks()->create([
            'name' => $rq->name,
        ]);

        return redirect('/task');
    }

    public function destroy($id)
    {
        //
    }
}
