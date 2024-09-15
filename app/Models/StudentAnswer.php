<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'exam_id',
        'exam_question_id',
        'answer',
        'is_correct',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exam_question()
    {
        return $this->belongsTo(ExamQuestion::class);
    }

    public function isCorrect()
    {
        // Mengecek apakah jawaban siswa sesuai dengan jawaban yang benar di ExamAnswer
        return $this->answer == $this->exam_question->correctAnswer->id; // pastikan ada correct_answer_id di ExamAnswer
    }

}
