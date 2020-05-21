<?php

namespace App\Providers;

use App\Repositories\TimeSheetsRepository;
use App\Repositories\Impl\RoleRepositoryImpl;
use App\Repositories\RoleRepository;
use App\Services\TimeSheetsService;
use App\Services\Impl\TimeSheetsServiceImpl;
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
use App\Repositories\Impl\TimeSheetsRepositoryImpl;
use App\Repositories\Impl\ChucvuRepositoryImpl;
use App\Repositories\Impl\BaseSalaryRepositoryImpl;
use App\Repositories\BaseSalaryRepository;
use App\Repositories\DonXinPhepRepository;
use App\Repositories\Impl\DonXinPhepRepositoryImpl;
use App\Repositories\Impl\WorkShiftRepositoryImpl;
use App\Services\NhanVienService;
use App\Repositories\NhanVienRepository;
use App\Repositories\WorkShiftRepository;
use App\Services\DonXinPhepService;
use App\Services\Impl\DonXinPhepServiceImpl;

use App\Services\ChucvuService;
use App\Services\Impl\ChucvuServiceImpl;
use App\Services\Impl\BaseSalaryServiceImpl;
use App\Services\BaseSalaryService;
use App\Services\Impl\WorkShiftServiceImpl;
use App\Services\WorkShiftService;

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
        /**
         * Bảng users
         */
        $this->app->singleton(
            UserRepository::class,
            UserRepositoryImpl::class,
        );

        $this->app->singleton(
            UserService::class,
            UserServiceImpl::class
        );

        /**
         * Bảng hệ số lương
         */
        $this->app->singleton(
            FactorSalaryRepository::class,
            FactorSalaryRepositoryImpl::class
        );

        $this->app->singleton(
            FactorSalaryService::class,
            FactorSalaryServiceImpl::class
        );

        /**
         * Bảng nhân viên
         */
        $this->app->singleton(
            NhanVienRepository::class,
            NhanVienRepositoryImpl::class
        );
        $this->app->singleton(
            NhanVienService::class,
            NhanVienServiceImpl::class
        );

        /**
         * Bảng roles quyền người dùng
         */
        $this->app->singleton(
            RoleService::class,
            RoleServiceImpl::class
        );

        $this->app->singleton(
            RoleRepository::class,
            RoleRepositoryImpl::class
        );

        /**
         * Bảng chức vụ
         */
        $this->app->singleton(
            ChucvuService::class,
            ChucvuServiceImpl::class
        );

        $this->app->singleton(
            ChucvuRepository::class,
            ChucvuRepositoryImpl::class
        );

        /**
         * Bảng lương cơ bản
         */
        $this->app->singleton(
            BaseSalaryService::class,
            BaseSalaryServiceImpl::class
        );

        $this->app->singleton(
            BaseSalaryRepository::class,
            BaseSalaryRepositoryImpl::class
        );

        /**
         * Bảng Đơn xin phép
         */
        $this->app->singleton(
            DonXinPhepService::class,
            DonXinPhepServiceImpl::class
        );

        $this->app->singleton(
            DonXinPhepRepository::class,
            DonXinPhepRepositoryImpl::class
        );

        /**
         * Bảng ca làm
        */
        $this->app->singleton(
            WorkShiftService::class,
            WorkShiftServiceImpl::class
        );

        $this->app->singleton(
            WorkShiftRepository::class,
            WorkShiftRepositoryImpl::class
        );

        /**
         * Chấm công
         */
        $this->app->singleton(
            TimeSheetsService::class,
            TimeSheetsServiceImpl::class
        );

        $this->app->singleton(
            TimeSheetsRepository::class,
            TimeSheetsRepositoryImpl::class
        );
    }
}
