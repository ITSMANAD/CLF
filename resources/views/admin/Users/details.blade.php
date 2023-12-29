@extends('admin.partials.master')
@section('title')
    اطلاعات کاربر
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">اطلاعات کاربر "{{$Users->name}}"</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                        <li class="breadcrumb-item"><a href="{{route('UsersSettings')}}">لیست کاربران</a></li>
                        <li class="breadcrumb-item active">اطلاعات کاربر</li>
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
                @if(session('error'))
                    <div role="alert" class="alert alert-error">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{session('error')}}</span>
                    </div>
                @endif
                @if(session('success'))
                    <div role="alert" class="alert alert-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{session('success')}}</span>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="fa fa-credit-card"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">موجودی کیف پول</span>
                                <span class="info-box-number">0 تومان</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="fa fa-shopping-bag"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">تعداد سفارشات</span>
                                <span class="info-box-number">0</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning"><i class="fa fa-shopping-basket"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">سبد خرید</span>
                                <span class="info-box-number">0</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="fa fa-dollar"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">ارزش سفارشات موفق</span>
                                <span class="info-box-number">0 تومان</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="container card card-normal">
                    <div class="">
                        <h1 class="card-header card-title">اطلاعات شخصی</h1>
                    </div>
                    <div class="content-section default">
                        <div class="row p-1">
                            <div class="col-sm-12 col-md-6 p-2">
                                <p>
                                    <span class="title fw-bold">نام و نام خانوادگی :</span>
                                    <span>{{$Users->name}}</span>
                                </p>
                            </div>
                            <div class="col-sm-12 col-md-6 p-2">
                                <p>
                                    <span class="title fw-bold">پست الکترونیک :</span>
                                    <span>{{$Users->email}}</span>
                                </p>
                            </div>
                            <div class="col-sm-12 col-md-6 p-2">
                                <p>
                                    <span class="title fw-bold">آدرس کاربر :</span>
                                    <span>{{$Users->address}}</span>
                                </p>
                            </div>
                            <div class="col-sm-12 col-md-6 p-2">
                                <p>
                                    <span class="title fw-bold">کد پستی :</span>
                                    <span>{{$Users->postalcode}}</span>
                                </p>
                            </div>
                            <div class="col-sm-12 col-md-6 p-2">
                                <p>
                                    <span class="title fw-bold">آیدی:</span>
                                    <span>{{$Users->id}}</span>
                                </p>
                            </div>
                            <div class="col-sm-12 col-md-6 p-2">
                                <p>
                                    <span class="title fw-bold">سطح دسترسی:</span>
                                    <span>@if($Users->isAdmin == 1) <span class="badge badge-neutral">ادمین اصلی</span> @endif @if($Users->isAdmin == 0) <span class="badge badge-primary">کاربر عادی</span> @endif
                                </p>
                            </div>
                            <div class="col-sm-12 col-md-6 p-2">
                                <p>
                                    <span class="title fw-bold">تاریخ ثبت نام :</span>
                                    <span>{{jdate($Users->created_at)->format('%d %B %Y')}}</span>
                                </p>
                            </div>
                            <br>
                            <div class="col-12 text-start mt-3">
                                <a href="/admin/users/{{$Users->id}}" class="btn btn-warning btn-sm text-light">
                                    <i class="bi bi-pen fs-5"></i>
                                    ویرایش</a>
                                <a href="/admin/users/delete/{{$Users->id}}" class="btn btn-error btn-sm text-light">
                                    <i class="bi bi-trash3 fs-5"></i>
                                    حذف</a>
                            </div>
                        </div>

                    </div>
                </div>
                    <div class="flex flex-col w-full lg:flex-row container-fluid">
                        <div class="card w-50 shadow-md">
                            <div class="card-header card-title bg-white border-0">آخرین نظرات</div>
                            <div class="card-body">
                                <p class="text-start opacity-75" style="font-size: 14px">چیزی برای نمایش وجود ندارد!</p>
                            </div>
                        </div>
                        <div class="divider lg:divider-horizontal"></div>
                        <div class="card w-50 shadow-md">
                            <div class="card-header card-title bg-white border-0">سبد خرید</div>
                            <div class="card-body">
                                <p class="text-start opacity-75" style="font-size: 14px">چیزی برای نمایش وجود ندارد!</p>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

@endsection
