<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use App\Models\BlogCategory;
use App\Models\BlogPosts;
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
}
