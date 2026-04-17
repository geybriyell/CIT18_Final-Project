@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">

        @csrf

        @method('PUT')

        <div class="mb-3">

            <label for="title" class="form-label">Title</label>

            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}" required>

            @error('title')

                <div class="text-danger">{{ $message }}</div>

            @enderror

        </div>

        <div class="mb-3">

            <label for="description" class="form-label">Description</label>

            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $task->description) }}</textarea>

        </div>

        <div class="mb-3 form-check">

            <input type="checkbox" class="form-check-input" id="completed" name="completed" value="1" {{ old('completed', $task->completed) ? 'checked' : '' }}>

            <label class="form-check-label" for="completed">Completed</label>

        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>

        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>

    </form>

</div>

@endsection