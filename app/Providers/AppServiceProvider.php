<?php

namespace App\Providers;

use App\Repositories\ChucvuRepository;
use App\Repositories\Impl\ChucvuRepositoryImpl;
use Illuminate\Support\ServiceProvider;

use App\Repositories\UserRepository;
use App\Repositories\Impl\UserRepositoryImpl;
use App\Services\ChucvuService;
use App\Services\Impl\ChucvuServiceImpl;
use App\Services\UserService;
use App\Services\Impl\UserServiceImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(
            UserRepository::class,
            UserRepositoryImpl::class
        );

        $this->app->singleton(
            UserService::class,
            UserServiceImpl::class
        );

        $this->app->singleton(
            ChucvuRepository::class,
            ChucvuRepositoryImpl::class
        );

        $this->app->singleton(
            ChucvuService::class,
            ChucvuServiceImpl::class
        );

    }
}
