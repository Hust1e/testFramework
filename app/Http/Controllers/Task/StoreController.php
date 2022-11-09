<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;

class StoreController extends Controller
{
    public function __invoke(TaskRequest $request)
    {
        $data = $request->validated();
        $request->user()->tasks()->create($data);
        $request->session()->flash('task.create', "The task created successfully");

        return redirect('/tasks');
    }
}
