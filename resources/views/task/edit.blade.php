<x-app-layout>
    @section('content')
        <div class="container-sm">
            <form action="{{ route('task.update', $task->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" required class="form-control @error('description') is-invalid @enderror"
                           name="name" id="name" value="{{ old('description', $task->name) }}" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" required class="form-control @error('description') is-invalid @enderror"
                           name="description" id="description" value="{{ old('description', $task->description) }}" placeholder="Description">
                </div>
                <div class="mt-3">
                    <input type="submit" class="btn btn-primary" value="Edit">
                </div>
            </form>
        </div>
    @endsection
</x-app-layout>
