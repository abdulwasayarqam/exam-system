<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use App\Models\Department;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('subjects.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dept_id' => 'required|exists:departments,id',
        ]);

        Subject::create([
            'name' => $request->input('name'),
            'dept_id' => $request->input('dept_id'),
        ]);

        return redirect()->route('subjects.index')->with('message', 'Subject created successfully!');
    }
}
