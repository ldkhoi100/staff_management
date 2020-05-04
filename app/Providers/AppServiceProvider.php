<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\CustomerRepository;
use App\Repositories\Impl\CustomerRepositoryImpl;
use App\Services\CustomerService;
use App\Services\Impl\CustomerServiceImpl;

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
            CustomerRepository::class,
            CustomerRepositoryImpl::class
        );

        $this->app->singleton(
            CustomerService::class,
            CustomerServiceImpl::class
        );
    }
}