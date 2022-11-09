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

    public function complete(Request $request, Task $task)
    {
        $task->update(['is_completed' => 1]);
        $request->session()->flash('task.complete', "The task moved to completed");
        return redirect('/tasks');
    }
}
