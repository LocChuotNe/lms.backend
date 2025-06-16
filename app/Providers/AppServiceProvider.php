<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\User\UserService;
use App\Services\User\UserServiceImplement;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryImplement;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //test
        $this->app->bind(UserRepository::class, UserRepositoryImplement::class);

        $this->app->bind(UserService::class, UserServiceImplement::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
