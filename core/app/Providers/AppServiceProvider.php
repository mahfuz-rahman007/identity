<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Admin;
use App\About;
use App\Setting;
use App\Social;

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
        //
        $setting = Setting::first();
        $adminProfile = Admin::first();
        $socials = Social::all();
        $abouts = About::first();

        View::share('setting', $setting);
        View::share('adminProfile', $adminProfile);
        View::share('socials', $socials);
        View::share('abouts', $abouts);
    }
}
