@extends('layout')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tasks</h1>

    <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
        Add Task
    </a>
    <!-- 
        @if(session('success'))
            <p class="text-green-600 mt-2">{{ session('success') }}</p>
        @endif -->

    @if(session('success'))
        <div class="mt-4 flex items-center rounded-lg bg-green-100 border border-green-400 px-4 py-3 text-green-700">
            <svg class="w-5 h-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414L9 13.414l4.707-4.707z"
                    clip-rule="evenodd" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif


    <h2 class="text-xl font-bold mt-4">🕒 Tasks Pending</h2>

<table class="w-full mt-2 border">
    <tr class="bg-gray-200">
        <th>Check</th>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

    @foreach($tasks as $task)
        <tr class="border">
            <td class="text-center">
                <form action="{{ route('tasks.toggleStatus', $task) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox" onchange="this.form.submit()">
                </form>
            </td>

            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
            <td>❌ Pending</td>

            <td>
                <a href="{{ route('tasks.edit', $task) }}">Edit</a>
            </td>
        </tr>
    @endforeach
</table>


<h2 class="text-xl font-bold mt-8 text-green-600">
    ✅ Tasks Completed
</h2>

<table class="w-full mt-2 border">
    <tr class="bg-green-200">
        <th>Check</th>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

    @foreach($completedTasks as $task)
        <tr class="border bg-green-50">
            <td class="text-center">
                <form action="{{ route('tasks.toggleStatus', $task) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox" checked onchange="this.form.submit()">
                </form>
            </td>

            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
            <td>✔ Completed</td>

            <td>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>


@endsection