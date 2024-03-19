<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopSetupRequest;
use App\Http\Requests\StoreOTP;
use App\Models\Banners;
use App\Models\BlogCategory;
use App\Models\BlogPosts;
use App\Models\codes;
use App\Models\Products;
use App\Models\Products_Price;
use App\Models\Settings;
use App\Models\ShopSettings;
use App\Models\User;
use Carbon\Carbon;
use Darryldecode\Cart\Cart;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected function changeEnv($data = array())
    {
        if (count($data) > 0) {

            // Read .env-file
            $env = file_get_contents(base_path() . '/.env');

            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);;

            // Loop through given data
            foreach ((array)$data as $key => $value) {

                // Loop through .env-data
                foreach ($env as $env_key => $env_value) {

                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

                    // Check, if new key fits the actual .env-key
                    if ($entry[0] == $key) {
                        // If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

            // Turn the array back to an String
            $env = implode("\n", $env);

            // And overwrite the .env with the new data
            file_put_contents(base_path() . '/.env', $env);

            return true;
        } else {
            return false;
        }
    }

    public function index()
    {
        //h$ means banner location in home page
        $h1 = Banners::all()->whereIn('blocation', 'h1');
        $h2 = Banners::all()->whereIn('blocation', 'h2');
        $h3 = Banners::all()->whereIn('blocation', 'h3');
        $h4 = Banners::all()->whereIn('blocation', 'h4');
        $Products = Products::all()->sortByDesc('created_at');
        $Posts = BlogPosts::all()->sortByDesc('created_at');
        return view('index', compact('h1', 'h2', 'h3', 'h4', 'Products','Posts'));
    }

    function blog()
    {
        $Posts = BlogPosts::all()->sortByDesc('created_at');
        $AllPosts = BlogPosts::all()->sortByDesc('created_at');
        return view('blog.index', compact('Posts', 'AllPosts'));
    }

    function BlogPost($slug)
    {
        $Posts = BlogPosts::all()->whereIn('slug', $slug);
        foreach ($Posts as $Post) {
            $Category = BlogCategory::all()->find($Post->category);
        }
        $AllPosts = BlogPosts::all()->take(5)->sortByDesc('created_at');
        return view('blog.post', compact('Posts', 'Category', 'AllPosts'));
    }

    function blogcategory($slug)
    {
        try {
            $Category = BlogCategory::whereIn('slug', [$slug])->firstOrFail();
            $Posts = BlogPosts::where('category', $Category->id)->orderByDesc('created_at')->get();
            $AllPosts = BlogPosts::orderByDesc('created_at')->take(5)->get();

            return view('blog.category', compact('Category', 'Posts', 'AllPosts'));
        } catch (ModelNotFoundException $e) {
            abort('404', 'مطلب مورد نظر پیدا نشد');
        }
    }

    function OTP()
    {
        return view('OTP');
    }

    function StoreOTP(StoreOTP $request)
    {
        $one = $request->input('one');
        $two = $request->input('two');
        $three = $request->input('three');
        $four = $request->input('four');
        $inputCode = $one . $two . $three . $four;
        $Codes = codes::all()->whereIn('UserID', auth()->user()->id)->first();
        if (is_null($Codes)) {
            return back()->with('error', 'کد نامعتبر است!');
        } elseif ($Codes->Code == $inputCode) {

            $Codes->delete();
            $User = User::where('id', auth()->user()->id)->update(['active' => 1]);
            return redirect(route('dashboard'));

        } else {
            return back()->with('error', 'کد نامعتبر است!');
        }
    }

    function installation()
    {
        return view('installation.index');
    }

    function SingleProduct($slug)
    {
        $Product = Products::all()->whereIn('slug', $slug)->first();
        if (!is_null($Product)) {
            return view('shop.singleproduct', compact('Product'));
        } else {

        }

    }
    function AddToCart($slug, Request $request)
    {
        if (auth()->check()){
            $Product = Products::all()->whereIn('slug',$slug)->first();
            $Product_Price = Products_Price::all()->whereIn('PID',$Product->id)->first();
            $UserID = auth()->user()->id;
            $rowId = rand(20,9999999);
           $Cart = new \App\Models\Cart();
           $Cart->UID = $UserID;
           $Cart->PID = $Product->id;
           $Cart->Price = $Product_Price->price;
           $Cart->Quantity = 1;
           $Cart->save();
            return 'OK';
        }else{
            return abort(403);
        }
    }

    function RemoveFromCart($id)
    {
        $Cart = \App\Models\Cart::all()->whereIn('id',$id)->first();
        $Cart->delete();
        return redirect('/');
    }
// ---------------------------------------
    function installation_env(Request $request)
    {
        $dbhost = $request->input('dbhost');
        $dbport = $request->input('dbport');
        $dbusername = $request->input('dbusername');
        $dbpassword = $request->input('dbpassword');
        $dbdatabase = $request->input('dbdatabase');
        $appurl = $request->input('appurl');
        $env_update = $this->changeEnv([
            'DB_HOST' => $dbhost,
            'DB_USERNAME' => $dbusername,
            'DB_PORT' => $dbport,
            'DB_PASSWORD' => $dbpassword,
            'DB_DATABASE' => $dbdatabase,
            'APP_URL' => $appurl
        ]);
        if ($env_update) {
            return back()->with('success', 'ذخیره انجام شد!');
        }
    }

    function installation_shop(ShopSetupRequest $request)
    {

        $Settings = new Settings();
        $SettingsCheck = Settings::all()->whereIn('id', '1');
        $Settings->sname = $request->input('sitename');
        $Settings->sdescription = $request->input('sitedesceiption');
        if ($request->hasFile('sitelogo')) {
            $destination = base_path() . '/public/img/';
            if (!is_dir($destination)) {
                mkdir($destination, 0777, true);
            }
            $destination = $destination . '/';
            $file = $request->file('sitelogo');
            $filenameone = $file->getClientOriginalName() . rand(1111111, 99999999) . '.' . $file->getClientOriginalExtension();
            $file->move($destination, $filenameone);
        }
        $Settings->slogo = "/img/" . $filenameone;
        $Settings->save();
        $ShopSettings = new ShopSettings();
        $ShopSettingsCheck = ShopSettings::all()->whereIn('id', '1');
        $ShopSettings->Type = $request->input('shoptype');
        $ShopSettings->Title = $request->input('sitesubject');
        $ShopSettings->Currency = "Toman";
        $ShopSettings->Ftitle = $request->input('sitename');
        $ShopSettings->Fseller = $request->input('sitename');
        $ShopSettings->save();
        return redirect(route('index'));
    }
}
