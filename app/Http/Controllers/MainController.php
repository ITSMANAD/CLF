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
        $Codes = codes::all()->whereIn('UserID', auth()->user()->id)->first();
        if (is_null($Codes)){

        }else{

                $Codes->delete();
                $User = User::where('id', auth()->user()->id)->update(['active' => 1]);
                return redirect(route('dashboard'));

        }
    }
}
