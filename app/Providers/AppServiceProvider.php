<?php

namespace App\Providers;

use App\Repositories\BacLuongRepository;
use App\Repositories\Impl\BacLuongRepositoryImpl;
use Illuminate\Support\ServiceProvider;

use App\Repositories\UserRepository;
use App\Repositories\Impl\UserRepositoryImpl;
use App\Services\BacLuongService;
use App\Services\Impl\BacLuongServiceImpl;
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
            BacLuongRepository::class,
            BacLuongRepositoryImpl::class
        );

        $this->app->singleton(
            BacLuongService::class,
            BacLuongServiceImpl::class
        );
    }
}
