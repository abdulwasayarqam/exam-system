<?php

namespace App\Http\Controllers;
use App\Models\Answer;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function viewPapers()
    {
        $papers = Answer::with(['user', 'question'])->get();

        return view('teacher.view_papers', compact('papers'));
    }
}
