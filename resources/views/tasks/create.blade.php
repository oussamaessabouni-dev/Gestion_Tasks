@extends('layout')

@section('content')
<h1 class="text-xl font-bold mb-4">Create Task</h1>

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf

    <input type="text" name="title" placeholder="Title"
           class="w-full p-2 border mb-3" required>

    <textarea name="description" placeholder="Description"
              class="w-full p-2 border mb-3"></textarea>

    <button class="bg-green-500 text-white px-4 py-2 rounded">
        Save
    </button>
</form>
@endsection
