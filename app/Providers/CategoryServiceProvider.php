<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('category',function($app){
			return $this->app->make('App\Category');
		});
		$this->app->bind('App\Interfaces\CategoryRepositoryInterface','App\Repositories\CategoryRepository');
    }
}
