@extends('layouts.app')

@section('content')

<div class="container">

    <h1>{{ $task->title }}</h1>

    <p>{{ $task->description }}</p>

    <p><strong>Status:</strong> {{ $task->completed ? 'Completed' : 'Open' }}</p>

    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-secondary">Edit</a>

    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>

    <a href="{{ route('tasks.index') }}" class="btn btn-link">Back to tasks</a>

</div>

@endsection