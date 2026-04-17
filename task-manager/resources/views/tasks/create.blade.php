@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Create Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label for="title" class="form-label">Title</label>

            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>

            @error('title')

                <div class="text-danger">{{ $message }}</div>

            @enderror

        </div>

        <div class="mb-3">

            <label for="description" class="form-label">Description</label>

            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>

        </div>

        <button type="submit" class="btn btn-primary">Create Task</button>

        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>

    </form>

</div>

@endsection