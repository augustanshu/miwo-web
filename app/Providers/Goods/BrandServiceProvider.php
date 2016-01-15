<?php

namespace App\Providers\Goods;

use Illuminate\Support\ServiceProvider;
use App\Models\Goods\Brand;

class BrandServiceProvider extends ServiceProvider
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
       $this->app->bind('brand',function($app){
		   return $this->app->make('App\Tools\Goods\Brand');
	   });
	   $this->app->bind('App\Interfaces\Goods\BrandRepositoryInterface','App\Repositories\Goods\BrandRepository');
    }
}
