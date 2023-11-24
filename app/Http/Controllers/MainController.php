<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use Illuminate\Http\Request;
class MainController extends Controller
{
    public function index() {
            //h$ means banner location in home page
            $h1 = Banners::all()->find(1);
            $h2 = Banners::all()->find(2);
            $h3 = Banners::all()->whereIn('blocation','h3');
            $h4 = Banners::all()->whereIn('blocation','h4');
            return view('index',compact('h1','h2','h3','h4'));
        }
}
