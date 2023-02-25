<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            \KairaDigital\Autentication\Domain\TokenValidator::class, 
            \KairaDigital\Autentication\Infrastructure\TokenValidators\TokenBearerValidator::class
        );

        $this->app->singleton(
            \KairaDigital\UrlShortener\Domain\UrlRepository::class, 
            \KairaDigital\UrlShortener\Infrastructure\UrlRepositories\TinyUrlRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
