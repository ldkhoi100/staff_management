<?php

namespace App\Providers;

use App\Repositories\Impl\RoleRepositoryImpl;
use App\Repositories\RoleRepository;
use App\Services\Impl\RoleServiceImpl;
use App\Services\RoleService;
use Illuminate\Support\ServiceProvider;

use App\Repositories\Impl\BacLuongRepositoryImpl;
use App\Services\Impl\BacLuongServiceImpl;

use App\Repositories\Impl\NhanVienRepositoryImpl;
use App\Services\Impl\NhanVienServiceImpl;

use App\Repositories\Impl\UserRepositoryImpl;
use App\Services\Impl\UserServiceImpl;

use App\Repositories\UserRepository;
use App\Services\UserService;

use App\Services\BacLuongService;
use App\Repositories\BacLuongRepository;
use App\Repositories\ChucvuRepository;
use App\Repositories\Impl\ChucvuRepositoryImpl;
use App\Services\NhanVienService;
use App\Repositories\NhanVienRepository;
use App\Services\ChucvuService;
use App\Services\Impl\ChucvuServiceImpl;

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
            UserRepositoryImpl::class,
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
            NhanVienRepository::class,
            NhanVienRepositoryImpl::class,
        );
        $this->app->singleton(
            NhanVienService::class,
            NhanVienServiceImpl::class
        );
        $this->app->singleton(
            RoleService::class,
            RoleServiceImpl::class
        );

        $this->app->singleton(
            RoleRepository::class,
            RoleRepositoryImpl::class
        );

        $this->app->singleton(
            ChucvuService::class,
            ChucvuServiceImpl::class
        );

        $this->app->singleton(
            ChucvuRepository::class,
            ChucvuRepositoryImpl::class
        );
    }
}
