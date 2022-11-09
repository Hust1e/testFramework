@if(session()->has('task.create'))
    <div class="alert alert-success alert-dismissible container-sm">
        <h5><i class="icon fas fa-check"></i> Success</h5>
        {{ session()->get('task.create') }}
    </div>
@elseif(session()->has('task.update'))
    <div class="alert alert-success alert-dismissible container-sm">
        <h5><i class="icon fas fa-check"></i> Success</h5>
        {{ session()->get('task.update') }}
    </div>
@elseif(session()->has('task.delete'))
    <div class="alert alert-success alert-dismissible container-sm">
        <h5><i class="icon fas fa-check"></i> Success</h5>
        {{ session()->get('task.delete') }}
    </div>
@elseif(session()->has('task.complete'))
    <div class="alert alert-success alert-dismissible container-sm">
        <h5><i class="icon fas fa-check"></i> Success</h5>
        {{ session()->get('task.complete') }}
    </div>
@endif
