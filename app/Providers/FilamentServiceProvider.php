<?php

namespace App\Providers;

use Filament\Facades\Filament;
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
        Filament::serving(function () {
            if (!auth()->user() || !auth()->user()->hasAnyRole(['admin', 'operator', 'teacher'])) {
                return redirect('dashboard'); // Akses ditolak jika tidak memiliki role yang sesuai
            }


        });
    }
}
