<?php

namespace App\Http\Controllers;
use App\Models\Paper;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\User;
class PaperController extends Controller
{


    public function create()
    {
        $subjects = Subject::all();
        $users = User::all(); // Fetch all users

        return view('papers.create', compact('subjects', 'users'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'title' => 'required|string|max:255',
            'users' => 'array',
        ]);

        $paper = Paper::create([
            'subject_id' => $request->input('subject_id'),
            'title' => $request->input('title'),
        ]);

        $paper->users()->sync($request->input('users'));

        return redirect('/papers/create')->with('success', 'Paper added successfully');
    }


}
