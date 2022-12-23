<?php

namespace App\Providers;

use App\Repositories\Implements\CategoryRepository;
use App\Repositories\Implements\ProductRepository;
use App\Repositories\Interfaces\ICategoryRepository;
use App\Repositories\Interfaces\IProductRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IProductRepository::class, ProductRepository::class);
        $this->app->singleton(ICategoryRepository::class, CategoryRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
