<!-- resources/views/teacher/view_papers.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Submitted Papers</h2>

        <table class="table">
            <thead>
            <tr>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Question</th>
                <th>Answer</th>
            </tr>
            </thead>
            <tbody>
            @foreach($papers as $paper)
                <tr>
                    <td>{{ $paper->user->name }}</td>
                    <td>{{ $paper->user->email }}</td>
                    <td>{{ $paper->question->content }}</td>
                    <td>{{ $paper->answer }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
