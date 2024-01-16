<?php

namespace App\Providers;

use App\Models\Banners;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Settings;
class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            DB::connection()->getPdo();
            if (DB::connection()->getDatabaseName()) {
                if (DB::connection()->table('settings')->exists()){
                    View::composer('*', function ($view) {
                        $setting = Settings::all();
                        $view->with('Settings', compact('setting'));
                    });
                }
            }
        } catch (\Exception $e) {

        }
    }
}
