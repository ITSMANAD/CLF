<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralUpdateR;
use App\Models\Settings;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    function Main() {
        return view('admin.index');
    }
    function GeneralSettings() {
        return view('admin.settings.general');
    }

    function GeneralUpdate(Request $request)
    {
        $settings = Settings::all()->find(1);
        $settings->sname = $request->input('sname');
        $settings->sdescription = $request->input('sdescription');
        $settings->update();
        return back()->with('success', 'عملیات با موفقیت انجام شد!');
    }

    function HomeSettings()
    {
        return view('admin.settings.home');
    }
    function IndexEdit(Request $request)
    {
     $id = $request->get('key');
     if ($id == "12121552"){
         $editsign = true;
         return view('index' , compact('editsign'));
     }
    }
}
