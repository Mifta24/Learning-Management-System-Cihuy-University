<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\StudentAnswer;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function index()
    {

        return view('front.index');
    }

    public function about()
    {

        return view('front.about');
    }

    public function courses()
    {
        // Cek apakah user memiliki role 'student'
        if (Auth::user()->hasRole('student')) {
            // Hanya tampilkan kursus yang sudah diikuti oleh student yang login
            $courses = Course::with(['lecturer', 'category'])
                ->whereHas('students', function ($query) {
                    // Filter kursus berdasarkan user_id yang sedang login
                    $query->where('user_id', Auth::user()->id);
                })
                ->orderByDesc('id')
                ->get();
        } else {
            // Jika user bukan student, tampilkan semua kursus
            $courses = Course::with(['lecturer', 'category'])->orderByDesc('id')->get();
        }

        return view('front.courses', compact('courses'));
    }


    public function courseDetails(Course $course)
    {
        $course->load(['lecturer', 'exams']);

        return view('front.course-details', compact('course'));
    }

    public function exam()
    {

        return view('front.courses');
    }

    public function contact()
    {

        return view('front.contact');
    }


    public function events()
    {
        return view('front.courses');
    }

    public function assignmentGrades()
    {
        $user = Auth::user();

        // Ambil semua jawaban siswa untuk user yang sedang login
        $studentAnswers = StudentAnswer::where('user_id', $user->id)->get();

        // Hitung total pertanyaan dan jumlah jawaban yang benar
        $totalQuestions = $studentAnswers->count();
        $correctAnswers = $studentAnswers->filter(function ($answer) {
            // Panggil method isCorrect untuk memeriksa apakah jawaban benar
            return $answer->isCorrect();
        })->count();

        // Hitung skor berdasarkan jawaban yang benar
        if ($totalQuestions > 0) {
            $score = ($correctAnswers / $totalQuestions) * 100;
        } else {
            $score = 0;
        }

        return view('profile.grades', compact('studentAnswers','score', 'totalQuestions', 'correctAnswers'));
    }

}
