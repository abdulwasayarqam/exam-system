<!-- resources/views/subjects/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
        }

        h1 {
            color: #007BFF;
        }

        p {
            margin: 8px 0;
            padding: 8px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        a {
            text-decoration: none;
            color: #007BFF;
            margin-right: 15px;
            display: inline-block;
            margin-top: 10px;
            padding: 8px 15px;
            background-color: #007BFF;
            color: #fff;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<h1>Subjects</h1>

@foreach($subjects as $subject)
    <p>{{ $subject->name }} - {{ $subject->department->name }}</p>
@endforeach

<a href="{{ route('subjects.create') }}">Add Subject</a>

</body>
</html>
