<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'teacher_id',
        'cover',
    ];


    protected static function boot()
    {
        parent::boot();

        static::saving(function ($course) {
            if (empty($course->slug)) {
                $course->slug = Str::slug($course->name);
            }
            if (empty($course->teacher_id)) {
                $course->teacher_id = Auth::user()->id;
            }

        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(User::class,'teacher_id','id');
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_students');
    }


}
