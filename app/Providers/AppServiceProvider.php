<?php

namespace App\Providers;

use App\Services\Implements\CategoryService;
use App\Services\Implements\ProductService;
use App\Services\Implements\UserService;
use App\Services\Interfaces\ICategoryService;
use App\Services\Interfaces\IProductService;
use App\Services\Interfaces\IUserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IUserService::class, UserService::class);
        $this->app->singleton(IProductService::class, ProductService::class);
        $this->app->singleton(ICategoryService::class, CategoryService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
