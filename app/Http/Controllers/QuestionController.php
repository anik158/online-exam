<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create()
    {
        return view('questions.create');
    }

    public function index()
    {
        $questions = Question::all();

        return view('questions.index', compact('questions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'question_text' => 'required',
            'options' => 'required|array|min:1',
            'correct_answers' => 'required',
        ]);

        Question::create([
            'question_text' => $request->question_text,
            'options' => json_encode($request->options),
            'correct_answers' => json_encode(explode(',', $request->correct_answers)),
        ]);

        return redirect()->route('dashboard')->with('success', 'Question added successfully');
    }


}
