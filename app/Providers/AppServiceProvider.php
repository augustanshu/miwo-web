<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Goods\Brand;

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
