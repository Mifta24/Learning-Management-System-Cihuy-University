<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'course_id',
        'start_date',
        'end_date',
    ];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function question()
    {
        return $this->hasMany(ExamQuestion::class);
    }
}
