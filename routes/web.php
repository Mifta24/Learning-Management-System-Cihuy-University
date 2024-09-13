<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Filament\Resources\CourseResource;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ProfileController;
use App\Models\Exam;

Route::get('/', function () {
    return view('welcome');
})->name('home');




Route::get('/courses',[FrontController::class,'courses'])->name('courses');
Route::get('/courses-details/{course:slug}',[FrontController::class,'courseDetails'])->name('courses.show');
Route::get('/about',[FrontController::class,'about'])->name('about');
Route::get('/lecturers',[FrontController::class,'lecturers'])->name('lecturers');
Route::get('/contact',[FrontController::class,'contact'])->name('contact');

Route::get('/exam/{exam}/start', [ExamController::class, 'show'])->name('exam.start');
Route::post('/exam/{exam}/submit', [ExamController::class, 'submit'])->name('exam.submit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
