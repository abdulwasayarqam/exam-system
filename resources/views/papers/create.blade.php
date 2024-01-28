<!-- resources/views/papers/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Create Paper</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="post" action="{{ url('/papers/store') }}" class="mt-3">
            @csrf

            <div class="mb-3">
                <label for="subject_id" class="form-label">Subject:</label>
                <select name="subject_id" id="subject_id" class="form-control" required>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Paper Title:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="users" class="form-label">Assigned Users:</label>
                <select name="users[]" id="users" class="form-control form-select" multiple>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
