<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Subject;
use App\Models\Paper;
use App\Models\Question;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function selectSubject()
    {
        $departments = Department::pluck('name', 'id');
        $subjects = Subject::pluck('name', 'id');

        return view('students.select_subject', compact('departments', 'subjects'));
    }

    public function viewQuestions(Request $request)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $department = Department::find($request->department_id);
        $subject = Subject::find($request->subject_id);


        $papers = $subject->papers;

        return view('students.view_questions', compact('department', 'subject', 'papers'));
    }
}
