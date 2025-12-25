@extends('layout')

@section('content')
<h1 class="text-xl font-bold mb-4">Edit Task</h1>

<form action="{{ route('tasks.update', $task) }}" method="POST">
    @csrf @method('PUT')

    <input type="text" name="title"
           value="{{ $task->title }}"
           class="w-full p-2 border mb-3">

    <textarea name="description"
              class="w-full p-2 border mb-3">{{ $task->description }}</textarea>

    <label class="flex items-center mb-3">
        <input type="checkbox" name="is_completed"
               {{ $task->is_completed ? 'checked' : '' }}>
        <span class="ml-2">Completed</span>
    </label>

    <button class="bg-blue-500 text-white px-4 py-2 rounded">
        Update
    </button>
</form>
@endsection
    