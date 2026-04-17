@extends('layouts.app')

@section('content')

<div class="container">

    <h1>My Tasks</h1>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create New Task</a>

    @if(session('success'))

        <div class="alert alert-success">{{ session('success') }}</div>

    @endif

    <div class="row">

        @foreach($tasks as $task)

        <div class="col-md-4 mb-3">

            <div class="card">

                <div class="card-body">

                    <h5 class="card-title">{{ $task->title }}</h5>

                    <p class="card-text">{{ $task->description }}</p>

                    <p class="card-text"><small class="text-muted">Completed: {{ $task->completed ? 'Yes' : 'No' }}</small></p>

                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-secondary">Edit</a>

                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">

                        @csrf

                        @method('DELETE')

                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>

                    </form>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection