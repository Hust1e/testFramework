<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

class UpdateController extends Controller
{
    public function __invoke(TaskRequest $request, Task $task)
    {
        $data = $request->validated();
        $task->update($data);
        $request->session()->flash('task.update', "The task updated successfully");

        return redirect('/tasks');
    }
}
