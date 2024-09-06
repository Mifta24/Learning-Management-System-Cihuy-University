<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer',
        'course_question_id',
        'is_correct',
    ];

    public function question()
    {
        return $this->belongsTo(CourseQuestion::class);
    }

}
