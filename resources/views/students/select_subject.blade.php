@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Select Department and Subject</h2>
        {!! Form::open(['route' => 'student.viewQuestions']) !!}
        <div class="form-group">
            {!! Form::label('department_id', 'Department:') !!}
            {!! Form::select('department_id', $departments, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('subject_id', 'Subject:') !!}
            {!! Form::select('subject_id', $subjects, null, ['class' => 'form-control']) !!}
        </div>
        <br>
        {!! Form::submit('View Questions', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection
