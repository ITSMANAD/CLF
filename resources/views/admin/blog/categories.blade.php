@extends('admin.partials.master')
@section('title', 'وبلاگ - دسته بندی ها')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">دسته بندی های وبلاگ</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item">وبلاگ</li>
                            <li class="breadcrumb-item active">دسته بندی ها</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @if(session('error'))
                    <div role="alert" class="alert alert-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{session('error')}}</span>
                    </div>
                @endif
                @if(session('success'))
                    <div role="alert" class="alert alert-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{session('success')}}</span>
                    </div>
                @endif
                    <!-- 1 -->
                <div class="card">
                    <div class="card-header">
                    <div class="card-title">
                        <h5>دسته بندی ها</h5>
                    </div>
                        <div class="card-tools">
                            <div class="join">
                                <input type="text" placeholder="جست و جو کنید" class="input input-bordered input-sm w-75 max-w-sm join-item " />
                                <a href="{{route('AddBlogCategory')}}" class="btn btn-success btn-sm join-item text-light fs-4">+</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="overflow-x-auto">
                        <table class="table table-xl">
                            <!-- head -->
                            <thead>
                            <tr class="text-center">
                                <th></th>
                                <th>نام</th>
                                <th>آدرس</th>
                                <th>سئو تگ</th>
                                <th>تاریخ ایجاد</th>
                                <th>عملیات ها</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- row 1 -->
                            @foreach($blogcategories as $Category)
                            <tr class="text-center">
                                <th>{{$Category->id}}</th>
                                <td>{{$Category->name}}</td>
                                <td>{{$Category->slug}}</td>
                                <td>{{$Category->tags}}</td>
                                <td>{{jdate($Category->created_at)->ago()}}</td>
                                <td>
                                    <a href="categories/edit/{{$Category->id}}" class="btn btn-warning btn-xs">ویرایش</a>
                                    <a href="categories/delete/{{$Category->id}}" class="btn btn-error text-light btn-xs">حذف</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>

                    <!-- 2 -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="card-title">
                                <h5>دسته بندی فرزند</h5>
                            </div>
                            <div class="card-tools">
                                <div class="join">
                                    <input type="text" placeholder="جست و جو کنید" class="input input-bordered input-sm w-75 max-w-sm join-item " />
                                    <a href="{{route('AddBlogSubCategory')}}" class="btn btn-success btn-sm join-item text-light fs-4">+</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="overflow-x-auto">
                                <table class="table table-xl">
                                    <!-- head -->
                                    <thead>
                                    <tr class="text-center">
                                        <th></th>
                                        <th>نام</th>
                                        <th>آدرس</th>
                                        <th>سئو تگ</th>
                                        <th>دسته بندی مادر</th>
                                        <th>تاریخ ایجاد</th>
                                        <th>عملیات ها</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- row 1 -->
                                    @foreach($SubCategory as $Category)
                                        <tr class="text-center">
                                            <th>{{$Category->id}}</th>
                                            <td>{{$Category->name}}</td>
                                            <td>{{$Category->slug}}</td>
                                            <td>{{$Category->tags}}</td>
                                            <td>
                                                @php
                                                $ThatCategory = \App\Models\BlogCategory::all()->find($Category->category);
                                                @endphp
                                                {{$ThatCategory->name}}
                                            </td>
                                            <td>{{jdate($Category->created_at)->ago()}}</td>
                                            <td>
                                                <a href="categories/sub/{{$Category->id}}" class="btn btn-warning btn-xs">ویرایش</a>
                                                <a href="categories/sub/delete/{{$Category->id}}" class="btn btn-error text-light btn-xs">حذف</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
