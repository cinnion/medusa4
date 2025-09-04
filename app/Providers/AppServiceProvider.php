<?php

namespace App\Providers;

use Dotenv\Parser\Parser;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Passport::useAuthCodeModel(\App\Models\MongoAuthCode::class);
        Passport::useClientModel(\App\Models\MongoClient::class);
        Passport::useRefreshTokenModel(\App\Models\MongoRefreshToken::class);
        Passport::useTokenModel(\App\Models\MongoToken::class);
        Passport::useDeviceCodeModel(\App\Models\MongoDeviceCode::class);

        if (env('APP_ENV') === 'production' || env('APP_ENV') === 'staging') {
            URL::forceHttps(true);
        }
    }
}
