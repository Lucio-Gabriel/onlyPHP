<?php

namespace App\Providers;

use App\Http\Middleware\AuthenticateCandidate;
use App\Http\Middleware\RedirectIfAuthenticatedCandidate;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app['router']->aliasMiddleware('redirect.candidate', RedirectIfAuthenticatedCandidate::class);
        $this->app['router']->aliasMiddleware('auth.candidate', AuthenticateCandidate::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(function (\SocialiteProviders\Manager\SocialiteWasCalled $event) {
            $event->extendSocialite('linkedin', \SocialiteProviders\LinkedIn\Provider::class);
        });

    }
}
