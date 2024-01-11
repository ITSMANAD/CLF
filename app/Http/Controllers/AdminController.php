<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralUpdateR;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreSubCategory;
use App\Http\Requests\UploadBannerImage;
use App\Http\Requests\user_edit_request;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\Banners;
use App\Models\BlogCategory;
use App\Models\BlogPosts;
use App\Models\BlogSubCategory;
use App\Models\Category;
use App\Models\MegaCategory;
use App\Models\Settings;
use App\Models\SubCategory;
use App\Models\User;
use Dotenv\Util\Str;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    function Main() {
        $CountUsers = User::all()->count();
        return view('admin.index',compact('CountUsers'));
    }
    function GeneralSettings() {
        return view('admin.settings.general');
    }
    function HomeSettings()
    {
        //h$ means banner location in home page
        $h1 = Banners::all()->whereIn('blocation','h1');
        $h2 = Banners::all()->whereIn('blocation','h2');
        $h3 = Banners::all()->whereIn('blocation','h3');
        $h4 = Banners::all()->whereIn('blocation','h4');
        return view('admin.settings.home',compact('h1','h2','h3','h4'));
    }
    function CategorySettings(){
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $megacategories = MegaCategory::all();
        return view('admin.content.category',compact('categories','subcategories','megacategories'));
    }
    function CategoryAdd(){
        return view('admin.content.categoryadd');
    }
    function CategorySubAdd(){
        $categories = Category::all();
        return view('admin.content.categorysubadd',compact('categories'));
    }
    function CategoryMegaAdd(){
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('admin.content.categorymegadd',compact('categories','subcategories'));
    }

    function CategoryEdit($id)
    {
        $Category = Category::all()->find($id);
        $type = 0;
        return view('admin.content.categoryedit',compact('Category','type'));
    }
    function SubCategoryEdit($id)
    {
        $categories = Category::all();
        $subcategory = SubCategory::all()->find($id);
        $type = 1;
        return view('admin.content.CategorySubEdit',compact('categories','subcategory','type'));
    }
    function MegaCategoryEdit($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $megacategory = MegaCategory::all()->find($id);
        $type = 2;
        return view('admin.content.CategoryMegaEdit',compact('categories','subcategories','megacategory','type'));
    }
    function UsersSettings(){
        $users = User::all();
        return view('admin.Users.user',compact('users'));
    }

    function UsersEdit($id)
    {
        $users = User::all()->whereIn('id',$id);
        if (is_null($users)){
            return \redirect(route('UsersSettings'))->with('error','این مقدار در دستابیس وجود ندارد!');
        }else{
            return view('admin.Users.edit',compact('users'));
        }

    }

    function UsersAdd()
    {
        return view('admin.Users.add');
    }

    function BlogCategory()
    {
        $blogcategories = BlogCategory::all();
        $SubCategory = BlogSubCategory::all();
        return view('admin.blog.categories',compact('blogcategories','SubCategory'));
    }

    function AddBlogCategory()
    {
        return view('admin.blog.addcategory');
    }

    function EditBlogCategory($id)
    {
        $BlogCategory = BlogCategory::all()->find($id);
        if (is_null($BlogCategory)){
            return \redirect(route('BlogCategory'))->with('error','این مقدار در دستابیس وجود ندارد!');
        }else{
            return view('admin.blog.editcategory',compact('BlogCategory'));
        }

    }

    function AddBlogSubCategory()
    {
        $blogcategories = BlogCategory::all();
      return view('admin.blog.addsubcategory',compact('blogcategories'));
    }

    function EditBlogSubCategory($id)
    {
        $BlogSubCategory = BlogSubCategory::all()->find($id);
        if (is_null($BlogSubCategory)){
            return \redirect(route('BlogCategory'))->with('error','این مقدار در دیتابیس وجود ندارد!');
        }else{
            $blogcategories = BlogCategory::all();

            return view('admin.blog.editsubcategory',compact('BlogSubCategory','blogcategories'));
        }

    }

    function BlogPosts()
    {
        $BlogPosts = BlogPosts::all()->sortByDesc('created_at');
        return view('admin.blog.blogposts',compact('BlogPosts'));
    }

    function HomeSettingsEdit($id)
    {
        $Img = Banners::all()->find($id);
        return view('admin.settings.edithome',compact('Img'));
    }

    function BlogNewPost()
    {
        return view('admin.blog.addpost');
    }

    function BlogEditPost($id)
    {
        $BlogPost = BlogPosts::all()->find($id);
        if (is_null($BlogPost)){
            return back()->with('error','این مقدار در دیتابیس وجود ندارد!');
        }else{
            return view('admin.blog.editpost',compact('BlogPost'));
        }
    }
    // ------------------
    function GeneralUpdate(Request $request)
    {
        //Upload Image
        $this->validate($request,[
            'slogo' => 'required|mimes:jpg,jpeg,png,gif|max:10240'
        ]);

        $destination= base_path().'/public/img/';
        if(!is_dir($destination))
        {
            mkdir($destination,0777,true);
        }
        $destination=$destination.'/';
        $file=$request->file('slogo');
        $filenameone = rand(1111111,99999999).'.'. $file->getClientOriginalExtension();
        $file->move($destination,$filenameone);

        $settings = Settings::all()->find(1);
        $settings->sname = $request->input('sname');
        $settings->sdescription = $request->input('sdescription');
        $settings->slogo = '/img/'.$filenameone;
        $settings->update();
        return back()->with('success', 'عملیات با موفقیت انجام شد!');
    }

    function HomeSettingsSubmit(UploadBannerImage $request){
        //Upload Image
        $destination= base_path().'/public/img/';
        if(!is_dir($destination))
        {
            mkdir($destination,0777,true);
        }
        $destination=$destination.'/';
        $file=$request->file('bimage');
        $filenameone = rand(1111111,99999999).'.'. $file->getClientOriginalExtension();
        $file->move($destination,$filenameone);
        $id = $request->input('id');
        $banner = Banners::all()->find($id);
        $banner->blink = $request->input('blink');
        $banner->bname = $request->input('bname');
        $banner->bimage = '/img/'.$filenameone;
        $banner->update();

    }

    function CategoryDelete(Request $request){
        $id = $request->input('id');
        $subcheck = SubCategory::all()->whereIn('category',$id);
        $megacheck = MegaCategory::all()->whereIn('category',$id);
        if ($subcheck->count() > 0 OR $subcheck->count() > 0 AND $megacheck->count() > 0){
            return back()->with('error','عملیات با مواجه شد! زیرا این دسته بندی دارای والد میباشد.');
        }else{
            $categories = Category::all()->find($id);
            $categories->delete();
            return back()->with('success','عملیات با موفقیت انجام شد!');
        }

    }

    function CategorySubDelete(Request $request)
    {
        $id = $request->input('id');
        $megacheck = MegaCategory::all()->whereIn('subcategory',$id);
        if ($megacheck->count() > 0){
            return back()->with('error','عملیات با مواجه شد! زیرا این دسته بندی دارای والد میباشد.');
        }else{
            $subcategories = SubCategory::all()->find($id);
            $subcategories->delete();
            return back()->with('success','عملیات با موفقیت انجام شد!');
        }

    }
    function CategoryMegaDelete(Request $request)
    {
        $id = $request->input('id');
        $megacategories = MegaCategory::all()->find($id);
        $megacategories->delete();
        return back()->with('success','عملیات با موفقیت انجام شد!');
    }
    function CategoryAddOne(StoreCategoryRequest $request)
    {
        $categories = new Category;

        //add
        $categories->name =  $request->input('name');
        $categories->slug =  $request->input('slug');
        $categories->description =  $request->input('description');
        $categories->status =  $request->input('status');
        $categories->logo =  "#";
        $categorycheck = Category::all()->whereIn('slug',$request->input('slug'));
        $categories->save();

    }
    function CategoryAddSubOne(StoreSubCategory $request)
    {
        $subcategory = new SubCategory;
        //add
        $subcategory->name =  $request->input('name');
        $subcategory->slug =  $request->input('slug');
        $subcategory->description =  $request->input('description');
        $subcategory->status =  $request->input('status');
        $subcategory->category =  $request->input('category');
        $subcategory->logo =  "#";
        $subcategorycheck = SubCategory::all()->whereIn('slug',$request->input('slug'));
        $subcategory->save();

    }

    function CategoryAddMegaOne(Request $request)
    {
        $megacategory = new MegaCategory();
        //add
        $megacategory->name =  $request->input('name');
        $megacategory->slug =  $request->input('slug');
        $megacategory->description =  $request->input('description');
        $megacategory->status =  $request->input('status');
        $megacategory->category =  $request->input('category');
        $megacategory->subcategory =  $request->input('subcategory');
        $megacategory->logo =  "#";
        $megacategorycheck = MegaCategory::all()->whereIn('slug',$request->input('slug'));
        if ($megacategorycheck->count() > 0){
            return back()->with('error','لینک تکراری است!');
        }else{
            $megacategory->save();
            return \redirect(route('CategorySettings'));
        }

    }
    function CategoryUpdateOne(StoreCategoryRequest $request)
    {
        $id = $request->input('id');
        $categories = Category::all()->find($id);
        //update
        $categories->name =  $request->input('name');
        $categories->slug =  $request->input('slug');
        $categories->description =  $request->input('description');
        $categories->status =  $request->input('status');
        $categories->logo =  "#";
        $categories->update();
    }
    function SubCategoryUpdateOne(Request $request)
    {
        $id = $request->input('id');
        $subcategory = SubCategory::all()->find($id);
        //add
        $subcategory->name =  $request->input('name');
        $subcategory->slug =  $request->input('slug');
        $subcategory->description =  $request->input('description');
        $subcategory->status =  $request->input('status');
        $subcategory->category =  $request->input('category');
        $subcategory->logo =  "#";
        $subcategory->update();
        return \redirect(route('CategorySettings'));
    }
    function UsersEditSubmit(Request $request)
    {
        $id = $request->input('id');
        $User = User::all()->find($id);
        $User->name = $request->input('name');
        $User->email = $request->input('email');
        $User->isAdmin = $request->input('isAdmin');
        $User->address = $request->input('address');
        $User->postalcode = $request->input('postalcode');
            $User->phone = $request->input('phone');
            $User->update();
            return back()->with('success','عملیات با موفقیت انجام شد!');


    }

    function UsersAddSubmit(Request $request)
    {
        $User = new User();
        $User->name = $request->input('name');
        $User->isAdmin = $request->input('isAdmin');
        $User->address = $request->input('address');
        $User->postalcode = $request->input('postalcode');
        $checknum = User::all()->whereIn('phone',$request->input('phone'));
        $checkmail = User::all()->whereIn('email',$request->input('email'));
        if ($request->input('passwordd') == $request->input('repassword')){
                if ($checknum->count() > 0){
                    return back()->with('error','شماره تماس قبلا ثبت شده است!');
                }else{
                    if ($checkmail->count() > 0){
                        return back()->with('error','ایمیل قبلا ثبت شده است!');
                    }else{
                        $User->password = Hash::make($request->input('passwordd'));
                        $User->email = $request->input('emaill');
                    $User->phone = $request->input('phone');
                    $User->save();
                    return back()->with('success','عملیات با موفقیت انجام شد!');
                    }
                }


        }else{
            return back()->with('error','رمز عبور ها یکسان نیست!');
        }



    }

    function UsersDelete($id)
    {
        $User = User::all()->find($id);

            if ($User->id == auth()->id()){
                return back()->with('error','شما نمیتوانید خود را حذف کنید!');
            }else{
                $User->delete();
                \redirect('/admin/users')->with('success','عملیات با موفقیت انجام شد!');
            }

    }

    function UsersDetails($id)
    {
        $Users = User::all()->find($id);
        if (is_null($Users)){
            return \redirect('/admin/users')->with('error','کاربری با این آیدی وجود ندارد!');
        }else{
            return view('admin.Users.details',compact('Users'));
        }

    }
    function AddBlogCategorySubmit(Request $request)
    {
        $BlogCategory = new BlogCategory();
        $BlogCategory->name = $request->input('name');
        $BlogCategory->slug = $request->input('slug');
        $BlogCategory->tags = $request->input('tags');
        $BlogCategory->save();
        return back()->with('success','عملیات با موفقیت انجام شد!');
    }
    function EditBlogCategorySubmit(Request $request)
    {
        $id = $request->input('id');
        $BlogCategory = BlogCategory::all()->find($id);
        $BlogCategory->name = $request->input('name');
        $slug = \Illuminate\Support\Str::slug($request->input('slug'),'-');
        $BlogCategory->slug = $slug;
        $BlogCategory->tags = $request->input('tags');

        if ($BlogCategory->update()){
            return back()->with('success','عملیات با موفقیت انجام شد!');
        }else{
            return back()->with('error','عملیات با خطا مواجه شد!');
        }
    }

    function AddBlogSubCategorySubmit(Request $request)
    {
        $BlogSubCategory = new BlogSubCategory();
        $BlogSubCategory->name = $request->input('name');
        $BlogSubCategory->slug = $request->input('slug');
        $BlogSubCategory->tags = $request->input('tags');
        $BlogSubCategory->category = $request->input('category');
        if (is_null($request->input('category'))){
            return back()->with('error','یک دسته بندی مادر انتخاب کنید!');
        }else{

            if ($BlogSubCategory->save()){
                return back()->with('success','عملیات با موفقیت انجام شد!');
            }else{
                return back()->with('error','عملیات با خطا مواجه شد!');
            }
        }
    }

    function DeleteBlogSubCategory($id)
    {
        $BlogSubCategory = BlogSubCategory::all()->find($id);
        if (!is_null($BlogSubCategory)){
            $BlogSubCategory->delete();
            return back()->with('success','عملیات با موفقیت انجام شد!');
        }else{
            return \redirect(route('BlogCategory'))->with('error','عملیات با خطا مواجه شد!');
        }
    }

    function DeleteBlogCategory($id)
    {
        $BlogCategory = BlogCategory::all()->find($id);
        $BlogSubCategory =BlogSubCategory::all()->whereIn('category',$id);
        if (count($BlogSubCategory) > 0){
            return \redirect(route('BlogCategory'))->with('error','انجام عملیات امکان پدیر نیست زیرا یک یا چند دسته بندی فرزند برای این دسته بندی وجود دارد!');
        }else{
            if (!is_null($BlogCategory)){
                $BlogCategory->delete();
                return back()->with('success','عملیات با موفقیت انجام شد!');
            }else{
                return \redirect(route('BlogCategory'))->with('error','عملیات با خطا مواجه شد!');
            }
        }

    }

    function EditBlogSubCategorySubmit(Request $request)
    {
        $id = $request->input('id');
        $BlogSubCategory = BlogSubCategory::all()->find($id);
        $BlogSubCategory->name = $request->input('name');
        $BlogSubCategory->slug = $request->input('slug');
        $BlogSubCategory->tags = $request->input('tags');
        $BlogSubCategory->category = $request->input('category');
        if (is_null($request->input('category'))){
            return back()->with('error','یک دسته بندی مادر انتخاب کنید!');
        }else{

            if ($BlogSubCategory->update()){
                return back()->with('success','عملیات با موفقیت انجام شد!');
            }else{
                return back()->with('error','عملیات با خطا مواجه شد!');
            }
        }
    }

    function BlogNewPostSubmit(StoreBlogPostRequest $request)
    {

            $BlogPosts = new BlogPosts();
            $this->validate($request,[
                'thumbnail' => 'required|mimes:jpg,jpeg,png,gif|max:30685'
            ]);

            $destination= base_path().'/public/img/';
            if(!is_dir($destination))
            {
                mkdir($destination,0777,true);
            }
            $destination=$destination.'/';
            $file=$request->file('thumbnail');
            $filenameone = $file->getFilename().rand(1111111,99999999).'.'. $file->getClientOriginalExtension();
            $file->move($destination,$filenameone);
            $BlogPosts->thumbnail = "/img/".$filenameone;
            $BlogPosts->title = $request->input('title');
            $BlogPosts->text = $request->input('text');
            $slug = \Illuminate\Support\Str::slug($request->input('slug'),'-');
            $BlogPosts->slug = $slug;
            $BlogPosts->description = $request->input('description');
            $BlogPosts->tags = $request->input('tags');
            $BlogPosts->category = $request->input('category');
            $BlogPosts->subcategory = 0;
            $BlogPosts->auther = auth()->user()->id;
            $BlogPosts->status = $request->input('status');
            $BlogPosts->save();
    }

    function BlogDeletePost(Request $request)
    {
        $id = $request->input('id');
        $BlogPosts = BlogPosts::all()->find($id);
        if (!is_null($BlogPosts) > 0){
            $BlogPosts->delete();
            return \redirect(route('BlogPosts'))->with('success','عملیات با موفقیت انجام شد!');
        }else{
            return \redirect(route('BlogPosts'))->with('error','عملیات با خطا مواجه شد!');
        }
    }

    function BlogEditPostSubmit(UpdateBlogPostRequest $request)
    {
        $id = $request->input('id');
        $BlogPosts = BlogPosts::all()->find($id);
        if ($request->hasFile('thumbnail')){
            $destination= base_path().'/public/img/';
            if(!is_dir($destination))
            {
                mkdir($destination,0777,true);
            }
            $destination=$destination.'/';
            $file=$request->file('thumbnail');
            $filenameone = $file->getFilename().rand(1111111,99999999).'.'. $file->getClientOriginalExtension();
            $file->move($destination,$filenameone);
            $BlogPosts->thumbnail = "/img/".$filenameone;
        }
        $BlogPosts->title = $request->input('title');
        $BlogPosts->text = $request->input('text');
        $BlogPosts->tags = $request->input('tags');
        $BlogPosts->category = $request->input('category');
        $BlogPosts->description = $request->input('description');
        $BlogPosts->subcategory = 0;
        $BlogPosts->auther = auth()->user()->id;
        $BlogPosts->status = $request->input('status');
        $BlogPosts->update();
    }
}

