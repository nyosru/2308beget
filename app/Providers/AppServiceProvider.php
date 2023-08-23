<?php

namespace App\Providers;

use App\Models\Domain;
use App\Models\User;
use App\Observers\DomainObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

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
        User::observe(UserObserver::class);
        Domain::observe(DomainObserver::class);
    }
}
