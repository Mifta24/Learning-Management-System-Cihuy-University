<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer',
        'user_id',
        'course_question_id',
    ];

    public function student()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(CourseQuestion::class);
    }
}
