<?php

namespace App\Http\Middleware;

use App\Models\Banners;
use App\Models\Settings;
use App\Models\User;
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
                    if (count(Banners::all()) > 0){

                    }else {
                        $Bannerh1 = new Banners();
                        $Bannerh1->balt = '-';
                        $Bannerh1->bname = '-';
                        $Bannerh1->blink = '#';
                        $Bannerh1->bimage = '#';
                        $Bannerh1->blocation = 'h1';
                        $Bannerh1->save();
                        for ($i = 0; $i < 2; $i++) {
                            $Bannerh1 = new Banners();
                            $Bannerh1->balt = '-';
                            $Bannerh1->bname = '-';
                            $Bannerh1->blink = '#';
                            $Bannerh1->bimage = '#';
                            $Bannerh1->blocation = 'h2';
                            $Bannerh1->save();
                            echo($i + 1);
                        }
                        for ($i = 0; $i < 1; $i++) {
                            $Bannerh1 = new Banners();
                            $Bannerh1->balt = '-';
                            $Bannerh1->bname = '-';
                            $Bannerh1->blink = '#';
                            $Bannerh1->bimage = '#';
                            $Bannerh1->blocation = 'h3';
                            $Bannerh1->save();
                            echo($i + 1);
                        }
                        for ($i = 0; $i < 4; $i++) {
                            $Bannerh1 = new Banners();
                            $Bannerh1->balt = '-';
                            $Bannerh1->bname = '-';
                            $Bannerh1->blink = '#';
                            $Bannerh1->bimage = '#';
                            $Bannerh1->blocation = 'h4';
                            $Bannerh1->save();
                            echo($i + 1);
                        }
                    }


                } else {
                    if (count(Banners::all()) > 0){

                    }else {
                        $Bannerh1 = new Banners();
                        $Bannerh1->balt = '-';
                        $Bannerh1->bname = '-';
                        $Bannerh1->blink = '#';
                        $Bannerh1->bimage = '#';
                        $Bannerh1->blocation = 'h1';
                        $Bannerh1->save();
                        for ($i = 0; $i < 2; $i++) {
                            $Bannerh1 = new Banners();
                            $Bannerh1->balt = '-';
                            $Bannerh1->bname = '-';
                            $Bannerh1->blink = '#';
                            $Bannerh1->bimage = '#';
                            $Bannerh1->blocation = 'h2';
                            $Bannerh1->save();
                            echo($i + 1);
                        }
                    }

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
