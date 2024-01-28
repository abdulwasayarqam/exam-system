<!-- resources/views/departments/create.blade.php -->
@extends('layouts.app')

@section('content')



    <title>Create Department</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            margin-right: 15px;
        }
    </style>

<body>

<h1>Create Department</h1>

<form action="{{ route('departments.store') }}" method="post">
    @csrf
    <label for="name">Department Name:</label>
    <input type="text" name="name" id="name" required>
    <button type="submit">Save Department</button>
</form>

<a href="{{ route('departments.index') }}">Back to Departments</a>

</body>
</html>
@endsection
