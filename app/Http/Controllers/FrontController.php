<?php

namespace App\Http\Controllers;

use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function index() {

        return view('front.index');
    }
    public function courses()
    {
        return view('front.courses');
    }

    public function courseDetails()
    {
        return view('front.course-details');
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
