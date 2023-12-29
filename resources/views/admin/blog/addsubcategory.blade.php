@extends('admin.partials.master')
@section('title', 'وبلاگ - افزودن دسته بندی فرزند')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">افزودن دسته بندی فرزند</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item">وبلاگ</li>
                            <li class="breadcrumb-item"><a href="{{route('BlogCategory')}}">دسته بندی ها</a></li>
                            <li class="breadcrumb-item">افزودن دسته بندی فرزند</li>

                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
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
                            <div class="w-50 mx-auto">
                                <div class="card container">
                                    <div class="card-header">
                                        <div class="card-title">افزودن</div>
                                    </div>
                                    <form action="{{route('AddBlogSubCategorySubmit')}}" method="post">
                                        <div class="card-body">
                                            @method('patch')
                                            @csrf
                                            <div class="container-fluid text-center ">
                                                <div class="row row-cols-2">
                                                    <div class="col">
                                                        <label class="form-control w-full max-w-xs">
                                                            <div class="label">
                                                                <span class="label-text">نام دسته بندی</span>
                                                            </div>
                                                            <input type="text" required placeholder="متن را وارد کنید" name="name" class="input input-bordered w-full max-w-xs" />
                                                            <div class="label">
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-control w-full max-w-xs">
                                                            <div class="label">
                                                                <span class="label-text">آدرس دسته بندی</span>
                                                            </div>
                                                            <input type="text" required placeholder="آدرس را وارد کنید" name="slug" class="input input-bordered w-full max-w-xs" />
                                                            <div class="label">
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-control w-full max-w-xs">
                                                            <div class="label">
                                                                <span class="label-text">تگ های سئو دسته بندی</span>
                                                            </div>
                                                            <input type="text" required placeholder="متن را وارد کنید" name="tags" class="input input-bordered w-full max-w-xs" />
                                                            <div class="label">
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-control w-full max-w-xs">
                                                            <div class="label">
                                                                <span class="label-text">دسته بندی مادر را انتخاب کنید</span>
                                                            </div>
                                                            <select required name="category" class="select select-bordered">
                                                                <option disabled selected>انتخاب کنید</option>
                                                                @foreach($blogcategories as $Category)
                                                                <option value="{{$Category->id}}">{{$Category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="label">
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-white">
                                            <button class="btn btn-wide btn-success float-start text-light">ثبت اطلاعات</button>
                                            <a href="{{route('BlogCategory')}}" class="btn btn-wide btn-error float-end text-light">لغو عملیات</a>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
