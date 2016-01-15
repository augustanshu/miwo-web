<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\TestRepository;

class TestServiceProvider extends ServiceProvider
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
		 $this->app->bind('test',function($app){
			return $this->app->make('App\Test');
		#$this->app->singleton('test',function(){
		#return new TestRepository();
		});
		
      $this->app->bind('App\Interfaces\TestRepositoryInterface',function(){
		 return  new TestRepository();
	   });
    }
}
