<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function index() {

        return view('front.index');
    }

    public function about() {

        return view('front.about');
    }

    public function courses()
    {
        $courses=Course::with(['lecturer','category'])->orderByDesc('id')->get();
        return view('front.courses',compact('courses'));
    }

    public function courseDetails(Course $course)
    {
        $course->load(['lecturer','exams']);

        return view('front.course-details',compact('course'));
    }

    public function exam()
    {

        return view('front.courses');
    }
    public function events()
    {
        return view('front.courses');
    }
}
