<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;
use App\Models\Course;
use App\Models\ExamResult;
use Illuminate\Http\Request;
use App\Models\StudentAnswer;
use Doctrine\DBAL\Schema\Index;
use App\Models\LearningMaterial;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{

    public function index()
    {
        // Mengambil semua pengguna
        $users = User::get();

        // Menghitung jumlah mahasiswa (role student)
        $studentCount = User::role('student')->count();

        // Menghitung jumlah dosen (role teacher)
        $teacherCount = User::role('teacher')->count();

        // Mengambil data courses
        $courses = Course::with(['lecturer', 'category', 'students'])->orderByDesc('id')->get();

        // Menghitung jumlah exams (sesuaikan dengan model Exams jika ada)
        $examsCount = Exam::count();

        return view('dashboard', compact('courses', 'users', 'studentCount', 'teacherCount', 'examsCount'));
    }


    public function about()
    {

        return view('front.about');
    }

    public function lecturers() {

        $lecturers=User::role('teacher')->get();
        return view('front.lecturers',compact('lecturers'));
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
        $course->load(['lecturer', 'exams', 'students', 'learning']);

        return view('front.course-details', compact('course'));
    }

    public function learningDetails($id)
    {
        $material = LearningMaterial::findOrFail($id);

        return view('front.learning-details', compact('material'));
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
        return view('front.contact');
    }

    public function assignmentGrades()
    {
        $user = Auth::user();

        $examResults = ExamResult::where('user_id', $user->id)->get();
        return view('profile.grades', compact('examResults'));
    }
}
