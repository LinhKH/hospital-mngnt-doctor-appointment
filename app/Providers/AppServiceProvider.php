<?php

namespace App\Providers;

use App\Models\AppSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        Paginator::useBootstrap();

        if(Schema::hasTable('settings')){

            $appSetting = AppSetting::first();
            View::share('appSetting',$appSetting);
        }else{
            $appSetting = "";
            View::share('appSetting',$appSetting);
        }
    }
}
