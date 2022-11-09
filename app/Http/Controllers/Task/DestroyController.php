<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Request $request, Task $task)
    {
        $task->delete();
        $request->session()->flash('task.delete', "The task deleted successfully");
        return redirect('/tasks');
    }
}
