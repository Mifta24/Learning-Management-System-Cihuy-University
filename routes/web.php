<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Filament\Resources\CourseResource;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/courses',[FrontController::class,'courses'])->name('courses');
Route::get('/courses-details',[FrontController::class,'courseDetails'])->name('courses.show');
Route::get('/events',[FrontController::class,'events'])->name('events');
Route::get('/events',[FrontController::class,'events'])->name('events');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
