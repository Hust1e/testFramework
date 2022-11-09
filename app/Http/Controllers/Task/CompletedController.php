<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class CompletedController extends Controller
{
    public function index(Request $request)
    {
        $tasks = $request->user()->tasks;
        foreach ($tasks as $task) {
            if ($task->is_completed == 1) {
                return view('task.completed', compact('tasks'));
            }
        }

        return view('task.completed');
    }

    public function complete(Task $task)
    {
        $task->update(['is_completed' => 1]);

        return view('task.index');
    }
}
