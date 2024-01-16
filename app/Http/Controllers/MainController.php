<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOTP;
use App\Models\Banners;
use App\Models\BlogCategory;
use App\Models\BlogPosts;
use App\Models\codes;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
class MainController extends Controller
{
    protected function changeEnv($data = array()){
        if(count($data) > 0){

            // Read .env-file
            $env = file_get_contents(base_path() . '/.env');

            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);;

            // Loop through given data
            foreach((array)$data as $key => $value){

                // Loop through .env-data
                foreach($env as $env_key => $env_value){

                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

                    // Check, if new key fits the actual .env-key
                    if($entry[0] == $key){
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
    public function index() {
            //h$ means banner location in home page
            $h1 = Banners::all()->whereIn('blocation','h1');
            $h2 = Banners::all()->whereIn('blocation','h2');
            $h3 = Banners::all()->whereIn('blocation','h3');
            $h4 = Banners::all()->whereIn('blocation','h4');
            return view('index',compact('h1','h2','h3','h4'));
        }

    function blog()
    {
        $Posts = BlogPosts::all()->sortByDesc('created_at');
        $AllPosts = BlogPosts::all()->sortByDesc('created_at');
        return view('blog.index',compact('Posts','AllPosts'));
    }

    function BlogPost($slug)
    {
        $Posts = BlogPosts::all()->whereIn('slug',$slug);
        foreach ($Posts as $Post) {
            $Category = BlogCategory::all()->find($Post->category);
        }
        $AllPosts = BlogPosts::all()->take(5)->sortByDesc('created_at');
        return view('blog.post',compact('Posts','Category','AllPosts'));
    }

    function blogcategory($slug)
    {
        try {
            $Category = BlogCategory::whereIn('slug', [$slug])->firstOrFail();
            $Posts = BlogPosts::where('category', $Category->id)->orderByDesc('created_at')->get();
            $AllPosts = BlogPosts::orderByDesc('created_at')->take(5)->get();

            return view('blog.category',compact('Category','Posts','AllPosts'));
        }catch (ModelNotFoundException $e){
            abort('404','مطلب مورد نظر پیدا نشد');
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
        $inputCode = $one.$two.$three.$four;
        $Codes = codes::all()->whereIn('UserID', auth()->user()->id)->first();
        if (is_null($Codes) ){
        return back()->with('error','کد نامعتبر است!');
        }elseif($Codes->Code == $inputCode){

                $Codes->delete();
                $User = User::where('id', auth()->user()->id)->update(['active' => 1]);
                return redirect(route('dashboard'));

        }else{
            return back()->with('error','کد نامعتبر است!');
        }
    }

    function installation()
    {
        return view('installation.index');
    }

    function installation_env(Request $request)
    {
        $dbhost = $request->input('dbhost');
        $dbport = $request->input('dbport');
        $dbusername = $request->input('dbusername');
        $dbpassword = $request->input('dbpassword');
        $dbdatabase = $request->input('dbdatabase');
        $appurl = $request->input('appurl');
        $env_update = $this->changeEnv([
            'DB_HOST'   => $dbhost,
            'DB_USERNAME'   => $dbusername,
            'DB_PORT'       => $dbport,
            'DB_PASSWORD'       => $dbpassword,
            'DB_DATABASE'       => $dbdatabase,
            'APP_URL'       => $appurl
        ]);
        if($env_update){
            return back()->with('success','ذخیره انجام شد!');
        }
    }
}
