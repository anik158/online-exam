<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Exam extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'negative_marking'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function examQuestions()
    {
        return $this->hasMany(ExamQuestion::class);
    }

    public function candidateExams()
    {
        return $this->hasMany(CandidateExam::class);
    }
}
