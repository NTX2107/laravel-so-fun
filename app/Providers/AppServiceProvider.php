<?php

namespace App\Providers;

use App\Services\Inplements\CategoryService;
use App\Services\Inplements\ProductService;
use App\Services\Interfaces\ICategoryService;
use App\Services\Interfaces\IProductService;
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
