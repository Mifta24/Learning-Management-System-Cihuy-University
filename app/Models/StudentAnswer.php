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
}
