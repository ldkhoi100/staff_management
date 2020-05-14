<?php

namespace App\Providers;

use App\Repositories\ChamCongNgayRepository;
use App\Repositories\CongthangRepository;
use App\Repositories\Impl\CongthangRepositoryImpl;
use App\Repositories\Impl\RoleRepositoryImpl;
use App\Repositories\RoleRepository;
use App\Services\ChamCongNgayService;
use App\Services\ChamCongThangService;
use App\Services\Impl\ChamCongNgayServiceImpl;
use App\Services\Impl\ChamCongThangServiceImpl;
use App\Services\Impl\RoleServiceImpl;
use App\Services\RoleService;
use Illuminate\Support\ServiceProvider;

use App\Repositories\Impl\FactorSalaryRepositoryImpl;
use App\Services\Impl\FactorSalaryServiceImpl;

use App\Repositories\Impl\NhanVienRepositoryImpl;
use App\Services\Impl\NhanVienServiceImpl;

use App\Repositories\Impl\UserRepositoryImpl;
use App\Services\Impl\UserServiceImpl;

use App\Repositories\UserRepository;
use App\Services\UserService;

use App\Services\FactorSalaryService;
use App\Repositories\FactorSalaryRepository;
use App\Repositories\ChucvuRepository;
use App\Repositories\Impl\ChamCongNgayRepositoryImpl;
use App\Repositories\Impl\ChucvuRepositoryImpl;
use App\Repositories\Impl\LuongCoBanRepositoryImpl;
use App\Repositories\LuongCoBanRepository;
use App\Services\NhanVienService;
use App\Repositories\NhanVienRepository;


use App\Services\DonXinPhepService;
use App\Services\Impl\DonXinPhepServiceImpl;

use App\Services\ChucvuService;
use App\Services\Impl\ChucvuServiceImpl;
use App\Services\Impl\LuongCoBanServiceImpl;
use App\Services\LuongCoBanService;

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
            FactorSalaryRepository::class,
            FactorSalaryRepositoryImpl::class
        );
        $this->app->singleton(
            FactorSalaryService::class,
            FactorSalaryServiceImpl::class
        );

        $this->app->singleton(
            NhanVienRepository::class,
            NhanVienRepositoryImpl::class
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

        $this->app->singleton(
            LuongCoBanService::class,
            LuongCoBanServiceImpl::class
        );

        $this->app->singleton(
            LuongCoBanRepository::class,
            LuongCoBanRepositoryImpl::class
        );

        $this->app->singleton(
            ChamCongNgayService::class,
            ChamCongNgayServiceImpl::class
        );

        $this->app->singleton(
            ChamCongNgayRepository::class,
            ChamCongNgayRepositoryImpl::class
        );
    }
}
