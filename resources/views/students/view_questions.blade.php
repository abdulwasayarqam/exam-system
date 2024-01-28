<!-- resources/views/students/view_questions.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>View Questions</h2>
        <p>Department: {{ $department->name }}</p>
        <p>Subject: {{ $subject->name }}</p>

        <form action="{{ route('answers.store') }}" method="post">
            @csrf
            <input type="hidden" name="department_id" value="{{ $department->id }}">
            <input type="hidden" name="subject_id" value="{{ $subject->id }}">

            @foreach($papers as $paper)
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="mb-0">Paper Title: {{ $paper->title }}</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($paper->questions as $question)
                                <li class="list-group-item">
                                    <strong>Question: {{ $question->content }}</strong>
                                    <p>Type: {{ $question->type }}</p>

                                    @if($question->type === 'short')
                                        <input type="text" class="form-control" name="answers[{{ $question->id }}]" placeholder="Enter your answer">
                                    @elseif($question->type === 'long')
                                        <textarea class="form-control" name="answers[{{ $question->id }}]" placeholder="Enter your answer"></textarea>
                                    @elseif($question->type === 'mcq')
                                        @php
                                            $options = json_decode($question->options);
                                        @endphp

                                        @if($options !== null)
                                            <div class="form-check">
                                                @foreach($options as $option)
                                                    <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="{{ $option }}" id="option-{{ $loop->index }}">
                                                    <label class="form-check-label" for="option-{{ $loop->index }}">
                                                        {{ $option }}
                                                    </label><br>
                                                @endforeach
                                            </div>
                                        @else
                                            <p class="text-danger">Invalid MCQ options</p>
                                        @endif
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Submit Answers</button>
        </form>
    </div>
@endsection
