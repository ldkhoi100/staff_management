<?php

namespace App\Providers;

use App\Http\Repositories\Impl\RoleRepositoryImpl;
use App\Repositories\BacLuongRepository;
use App\Repositories\Impl\BacLuongRepositoryImpl;
use App\Repositories\RoleRepository;
use App\Services\Impl\RoleServiceImpl;
use App\Services\RoleService;
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

        $this->app->singleton(
            RoleService::class,
            RoleServiceImpl::class
        );

        $this->app->singleton(
            RoleRepository::class,
            RoleRepositoryImpl::class
        );
    }
}
