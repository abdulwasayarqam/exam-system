<!-- resources/views/departments/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Department</h1>

        <form action="{{ route('departments.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Department Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Save Department</button>

        </form>
        <br>

        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back to Departments</a>
    </div>
@endsection
