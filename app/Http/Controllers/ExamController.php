<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\Question;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function create(){
        $questions = Question::all();
        return view('exam.create', compact('questions'));
    }

    public function index(){
        $exams = Exam::all();
        return view('exam.exams', compact('exams'));
    }

    public function store(Request $request)
    {
        $exam = new Exam;
        $exam->user_id = auth()->user()->id;
        $exam->title = $request->title;
        $exam->negative_marking = $request->has('negative_marking');
        $exam->save();

        if ($request->questions) {
            foreach ($request->questions as $question_id => $value) {
                if ($value) {
                    $exam_question = new ExamQuestion;
                    $exam_question->exam_id = $exam->id;
                    $exam_question->question_id = $question_id;
                    $exam_question->marks = $request->marks[$question_id];
                    $exam_question->save();
                }
            }
        }

        return redirect()->route('dashboard')->with('success', 'Exam created successfully');
    }



}
