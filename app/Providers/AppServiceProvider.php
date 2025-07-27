<?php

namespace App\Providers;

use App\Http\Middleware\RedirectIfAuthenticatedCandidate;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app['router']->aliasMiddleware('auth.candidate', AuthMiddleware::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Event::listen(function (\SocialiteProviders\Manager\SocialiteWasCalled $event) {
            $event->extendSocialite('linkedin', \SocialiteProviders\LinkedIn\Provider::class);
            $event->extendSocialite('linkedin_recruiter', \SocialiteProviders\LinkedIn\Provider::class);
        });
    }
}
