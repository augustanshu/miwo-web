<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Goods\GoodsClass;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(public_path('themes/admin/views'), 'admin');
        $this->loadViewsFrom(public_path('themes/public/views'), 'public');
		GoodsClass::creating(function()
		{
			echo '111111';
		});
		
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
