<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $tasks = $request->user()->tasks;
        foreach ($tasks as $task)
            if($task->is_completed == 0){
                return view('task.index', compact('tasks'));
            }
        return view('task.index');
    }
}
