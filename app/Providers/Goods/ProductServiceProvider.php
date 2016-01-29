<?php

namespace App\Providers\Goods;

use Illuminate\Support\ServiceProvider;
use App\Models\Goods\Product;

class ProductServiceProvider extends ServiceProvider
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
       $this->app->bind('product',function($app){
		  return $this->app->make('App\Tools\Goods\Product'); 
	   });
	   $this->app->bind(
	   'App\Interfaces\Goods\ProductRepositoryInterface','App\Repositories\Goods\ProductRepository'
	   );
    }
}
