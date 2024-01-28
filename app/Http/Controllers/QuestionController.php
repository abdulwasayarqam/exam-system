<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Paper;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create()
    {
        $subjects = Subject::pluck('name', 'id');
        $papers = Paper::pluck('title', 'id');
        return view('questions.create', compact('subjects', 'papers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'paper_id' => 'required|exists:papers,id',
            'questions' => 'required|array',
            'questions.*.content' => 'required|string',
            'questions.*.type' => 'required|in:short,long,mcq',
            'questions.*.options' => 'array|required_if:questions.*.type,mcq',
        ]);

        $paper = Paper::find($request->input('paper_id'));

        foreach ($request->input('questions') as $questionData) {
            $question = new Question([
                'content' => $questionData['content'],
                'type' => $questionData['type'],
            ]);

            if ($questionData['type'] === 'mcq') {
                $question->options = json_encode($questionData['options']);
            }


            $question->paper_id = $paper->id;

            $question->save();
        }

        return redirect()->route('questions.create')->with('success', 'Questions added successfully');
    }
}
