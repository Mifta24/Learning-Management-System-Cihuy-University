<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/lecturers', [FrontController::class, 'lecturers'])->name('lecturers');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::get('/courses', [FrontController::class, 'courses'])->name('courses');
Route::get('/courses-details/{course:slug}', [FrontController::class, 'courseDetails'])->name('courses.show');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/exam/{exam}/start', [ExamController::class, 'show'])->name('exam.start');
    Route::post('/exam/{exam}/submit', [ExamController::class, 'submit'])->name('exam.submit');

    Route::get('/assignment-grades', [FrontController::class, 'assignmentGrades'])->name('assignment.grades');
    Route::get('/my-scores', [ExamController::class, 'showScores'])->name('exam.scores');
});

require __DIR__ . '/auth.php';
