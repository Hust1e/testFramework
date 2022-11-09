<x-app-layout>
    @section('content')
        <div class="container-sm">
            <form action="{{ route('task.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name for todo">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"  placeholder="Description"></textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="Create">
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    @endsection
</x-app-layout>
