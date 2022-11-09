<x-app-layout>
    @section('content')
        @if(isset($tasks))
        <div class="container-sm">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                @foreach($tasks as $task)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="{{ $task->id }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="{{ "#flush" . $task->id }}" aria-expanded="false" aria-controls="flush-collapseOne">
                                {{ $task->name }}
                            </button>
                        </h2>
                        <div id="{{ "flush" . $task->id }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">{{$task->description}}
                                <div class="d-flex">
                                    <form action="{{ route('task.edit', $task->id) }}" method="get">
                                        <input type="submit" class="btn btn-primary" value="Edit">
                                    </form>
                                    <form action="{{ route('task.delete', $task->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="container-sm">
            No tasks
        </div>
        @endif
    @endsection
</x-app-layout>
