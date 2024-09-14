<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::middleware('role:admin|operator')
            ->group(function () {
                Route::prefix('admin')->group(function () {
                    // Daftarkan resource yang membutuhkan middleware
                    Route::resource('categories', \App\Filament\Resources\CategoryResource::class);
                    Route::resource('teachers', \App\Filament\Resources\TeacherResource::class);
                    Route::resource('users', \App\Filament\Resources\UserResource::class);
                    Route::resource('users', \App\Filament\Resources\UserResource::class);
                });
            });
    }
}
