<!-- resources/views/departments/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        p {
            margin: 8px 0;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            margin-right: 15px;
        }
    </style>
</head>
<body>

<h1>Departments</h1>

@foreach($departments as $department)
    <p>{{ $department->name }}</p>
@endforeach

<a href="{{ route('departments.create') }}">Add Department</a>

</body>
</html>
