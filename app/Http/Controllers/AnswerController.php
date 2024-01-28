<?php

namespace App\Http\Controllers;
use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'subject_id' => 'required|exists:subjects,id',
            'answers' => 'required|array',
        ]);

        $user = auth()->user();


        foreach ($request->input('answers') as $questionId => $answer) {
            Answer::create([
                'user_id' => $user->id,
                'department_id' => $request->input('department_id'),
                'subject_id' => $request->input('subject_id'),
                'question_id' => $questionId,
                'answer' => is_array($answer) ? implode(', ', $answer) : $answer,
            ]);
        }

        return redirect()->route('home')->with('success', 'Answers submitted successfully');
    }
}
