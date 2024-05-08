<?php

namespace App\Http\Controllers;

use App\Models\CandidateExam;
use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\Question;
use Illuminate\Http\Request;

class CandidateExamController extends Controller
{
    public function takesExam(Exam $examId){
        return view('candidate.candidate-takes-exam',compact('examId'));
    }

    public function store(Request $request, $examId)
    {
        $exam = Exam::find($examId);

        $candidate_exam = new CandidateExam;
        $candidate_exam->user_id = auth()->user()->id;
        $candidate_exam->exam_id = $examId;
        $candidate_exam->answers = json_encode($request->answers);
        $candidate_exam->save();

        $score = 0;
        foreach ($request->answers as $question_id => $answer) {
            $question = Question::find($question_id);
            $correct_answers = json_decode($question->correct_answers);
            if (in_array($answer, $correct_answers)) {
                $exam_question = ExamQuestion::where('exam_id', $examId)->where('question_id', $question_id)->first();
                $score += $exam_question->marks;
            } elseif ($exam->negative_marking) {
                $score -= 1;
            }
        }

        $candidate_exam->score = $score;
        $candidate_exam->save();

        return redirect()->route('dashboard')->with('success', 'Exam submitted successfully');
    }





}
