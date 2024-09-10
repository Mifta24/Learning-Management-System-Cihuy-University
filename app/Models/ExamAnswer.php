<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer',
        'exam_question_id',
        'is_correct',
    ];

    public function exam_question()
    {
        return $this->belongsTo(ExamQuestion::class);
    }
}
