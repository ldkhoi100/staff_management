<?php

namespace App\Providers;

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

use App\Services\NhanVienService;
use App\Repositories\NhanVienRepository;

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
            UserService::class,
            UserServiceImpl::class
        );

        $this->app->singleton(
            BacLuongRepository::class,
            BacLuongRepositoryImpl::class,
            BacLuongService::class,
            BacLuongServiceImpl::class
        );

        $this->app->singleton(
            NhanVienRepository::class,
            NhanVienRepositoryImpl::class,
            NhanVienService::class,
            NhanVienServiceImpl::class
        );
    }
}