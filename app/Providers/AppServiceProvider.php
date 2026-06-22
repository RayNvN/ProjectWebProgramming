<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider; // <-- 1. Tambahkan baris ini di atas

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // 2. Tambahkan blok kode ini
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
