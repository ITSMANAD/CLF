<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(MainController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/posts', 'blog')->name('Blog');
    Route::get('/posts/{slug}', 'blogpost')->name('BlogPost');
    Route::get('/posts/category/{slug}', 'blogcategory')->name('BlogCategory');
    Route::get('/installation', 'installation')->name('installation');
    Route::patch('/installation/shop', 'installation_shop')->name('installation_shop');
    Route::post('/installation/env', 'installation_env')->name('installation_env');
    Route::get('/shop/{slug}','SingleProduct');
    Route::post('/shop/{slug}','AddToCart');
    Route::get('/cart/remove/{id}','RemoveFromCart');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/password', [ProfileController::class, 'editpassword'])->name('profile.editpass');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::controller(MainController::class)->group(function () {
        Route::get('/OTP', 'OTP')->name('OTP');
        Route::post('/OTP', 'StoreOTP')->name('StoreOTP');
    });

});
Route::middleware('admin')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin', 'Main')->name('admin');
        Route::get('/admin/settings', 'GeneralSettings')->name('GeneralSettings');
        Route::patch('/admin/settings', 'GeneralUpdate')->name('General.Update');
        Route::get('/admin/settings/home', 'HomeSettings')->name('HomeSettings');
        Route::get('/admin/settings/home/{id}', 'HomeSettingsEdit')->name('HomeSettingsEdit');
        Route::post('/admin/settings/home/', 'HomeSettingsSubmit')->name('HomeSettingsSubmit');
        Route::get('/admin/categories', 'CategorySettings')->name('CategorySettings');
        Route::patch('/admin/categories/delete', 'CategoryDelete')->name('CategoryDelete');
        Route::patch('/admin/categories/delete/sub', 'CategorySubDelete')->name('CategorySubDelete');
        Route::patch('/admin/categories/delete/mega', 'CategoryMegaDelete')->name('CategoryMegaDelete');
        Route::get('/admin/categories/add', 'CategoryAdd')->name('CategoryAdd');
        Route::post('/admin/categories/add', 'CategoryAddOne')->name('CategoryAddOne');
        Route::post('/admin/categories/add/sub', 'CategoryAddSubOne')->name('CategoryAddSubOne');
        Route::get('/admin/categories/add/sub', 'CategorySubAdd')->name('CategorySubAdd');
        Route::get('/admin/categories/add/mega', 'CategoryMegaAdd')->name('CategoryMegaAdd');
        Route::patch('/admin/categories/add/mega', 'CategoryAddMegaOne')->name('CategoryAddMegaOne');
        Route::get('/admin/categories/edit/{id}', 'CategoryEdit');
        Route::get('/admin/categories/edit/sub/{id}', 'SubCategoryEdit');
        Route::get('/admin/categories/edit/mega/{id}', 'MegaCategoryEdit');

        Route::post('/admin/categories/edit', 'CategoryUpdateOne')->name('CategoryUpdateOne');
        Route::patch('/admin/categories/edit/sub', 'SubCategoryUpdateOne')->name('SubCategoryUpdateOne');
        Route::patch('/admin/categories/edit/mega', 'MegaCategoryUpdateOne')->name('MegaCategoryUpdateOne');

        //Users Routes
        Route::get('/admin/users', 'UsersSettings')->name('UsersSettings');
        Route::get('/admin/users/add', 'UsersAdd')->name('UsersAdd');
        Route::patch('/admin/users/add', 'UsersAddSubmit')->name('UsersAddSubmit');
        Route::get('/admin/users/{id}', 'UsersEdit')->name('UsersEdit');
        Route::patch('/admin/users', 'UsersEditSubmit')->name('UsersEditSubmit');
        Route::get('/admin/users/details/{id}', 'UsersDetails')->name('UsersDetails');
        Route::get('/admin/users/delete/{id}', 'UsersDelete')->name('UsersDelete');

        // Blog Routes
        //Category
        Route::get('/admin/blog/categories', 'BlogCategory')->name('BlogCategory');
        Route::get('/admin/blog/categories/add', 'AddBlogCategory')->name('AddBlogCategory');
        Route::patch('/admin/blog/categories/add', 'AddBlogCategorySubmit')->name('AddBlogCategorySubmit');
        Route::get('/admin/blog/categories/edit/{id}', 'EditBlogCategory')->name('EditBlogCategory');
        Route::patch('/admin/blog/categories/edit', 'EditBlogCategorySubmit')->name('EditBlogCategorySubmit');
        //SubCategory
        Route::get('/admin/blog/categories/addsub', 'AddBlogSubCategory')->name('AddBlogSubCategory');
        Route::patch('/admin/blog/categories/addsub', 'AddBlogSubCategorySubmit')->name('AddBlogSubCategorySubmit');
        Route::get('/admin/blog/categories/sub/{id}', 'EditBlogSubCategory')->name('EditBlogSubCategory');
        Route::patch('/admin/blog/categories/sub', 'EditBlogSubCategorySubmit')->name('EditBlogSubCategorySubmit');
        Route::get('/admin/blog/categories/sub/delete/{id}', 'DeleteBlogSubCategory')->name('DeleteBlogSubCategory');
        Route::get('/admin/blog/categories/delete/{id}', 'DeleteBlogCategory')->name('DeleteBlogCategory');
        //Main Of Blog
        Route::get('/admin/blog/posts', 'BlogPosts')->name('BlogPosts');
        Route::get('/admin/blog/posts/new', 'BlogNewPost')->name('BlogNewPost');
        Route::get('/admin/blog/posts/edit/{id}', 'BlogEditPost')->name('BlogEditPost');
        Route::post('/admin/blog/posts/edit', 'BlogEditPostSubmit')->name('BlogEditPostSubmit');
        Route::post('/admin/blog/posts/new', 'BlogNewPostSubmit')->name('BlogNewPostSubmit');
        Route::put('/admin/blog/posts/delete', 'BlogDeletePost')->name('BlogDeletePost');
        // Shop
        //Settings
        Route::get('/admin/shop/settings', 'ShopSettings')->name('ShopSettings');
        Route::post('/admin/shop/settings', 'ShopSettingsStore')->name('ShopSettingsStore');
        //Attributes
        Route::get('/admin/shop/attributeGroups', 'ShopAttributeGroups')->name('ShopAttributeGroups');
        Route::put('/admin/shop/attributeGroups/delete', 'ShopAttributeGroupsDelete')->name('ShopAttributeGroupsDelete');
        Route::get('/admin/shop/attributeGroups/add', 'ShopAttributeGroupsAdd')->name('ShopAttributeGroupsAdd');
        Route::get('/admin/shop/attributeGroups/edit/{id}', 'ShopAttributeGroupsEdit')->name('ShopAttributeGroupsEdit');
        Route::patch('/admin/shop/attributeGroups/edit', 'ShopAttributeGroupsEditStore')->name('ShopAttributeGroupsEditStore');
        Route::patch('/admin/shop/attributeGroups/add', 'ShopAttributeGroupsAddStore')->name('ShopAttributeGroupsAddStore');
        Route::get('/admin/shop/attributeGroups/attribute', 'ShopAttributeAdd')->name('ShopAttributeAdd');
        Route::patch('/admin/shop/attributeGroups/attribute', 'ShopAttributeAddStore')->name('ShopAttributeAddStore');
        Route::get('/admin/shop/attributeGroups/{id}', 'ShopAttributesGroupAt')->name('ShopAttributesGroupAt');
        Route::put('/admin/shop/attributeGroups/attribute/delete', 'ShopAttributeDelete')->name('ShopAttributeDelete');
        //Brands
        Route::get('/admin/shop/brands', 'ShopBrands')->name('ShopBrands');
        Route::get('/admin/shop/brands/add', 'ShopBrandsAdd')->name('ShopBrandsAdd');
        Route::patch('/admin/shop/brands/add', 'ShopBrandsAddStore')->name('ShopBrandsAddStore');
        Route::put('/admin/shop/brands/delete', 'ShopBrandsDelete')->name('ShopBrandsDelete');
        //ProductInfo

        //Products
        Route::get('/admin/shop/products', 'ShopProducts')->name('ShopProducts');
        Route::get('/admin/shop/products/{id}', 'ShopProduct');
        Route::get('/admin/shop/specs', 'ProductsSpecs')->name('ProductsSpecs');
        Route::get('/admin/inventory', 'ShopInventory')->name('ShopInventory');
        //Carrier
        Route::get('/admin/shop/carriers','ShopCarriers')->name('ShopCarriers');
        Route::get('/admin/shop/carriers/add','ShopCarriersAdd')->name('ShopCarriersAdd');
    });
});


require __DIR__ . '/auth.php';
