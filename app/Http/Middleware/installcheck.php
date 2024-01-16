<?php

namespace App\Http\Middleware;

use App\Models\Settings;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class installcheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {

        if ($request->is('installation*')) {
            try {
                DB::connection()->getPdo();
                if (DB::connection()->getDatabaseName()) {
                    Artisan::call('migrate');
                } else {

                }
            } catch (\Exception $e) {

            }
        }else{
            try {
                DB::connection()->getPdo();
                if (DB::connection()->getDatabaseName()) {
                    if (DB::connection()->table('settings')->exists() AND is_null(DB::connection()->table('settings'))) {
                        redirect(route('installation'));
                    } else {
                        redirect(route('installation'));
                    }
                } else {
                    redirect(route('installation'));
                }
                $Settings = Settings::all()->first();
                foreach ($Settings as $setting) {
                    if (is_null($Settings)){

                    }else{
                        redirect(route('installation'));
                    }
                }

            } catch (\Exception $e) {
                die(redirect(route('installation')));
            }
        }
        return $next($request);
    }
}
