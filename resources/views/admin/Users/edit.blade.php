@extends('admin.partials.master')
@section('title')
    ویرایش کاربر
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">ویرایش کاربر</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="{{route('UsersSettings')}}">لیست کاربران</a></li>
                            <li class="breadcrumb-item active">ویرایش کاربر</li>
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
                    <div role="alert" class="alert alert-success">
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
                    <!-- /.col-md-6 -->
                    <div class="card rounded shadow-lg">

                        <div class="card-header bg-light">
                            <span class="fs-5 fw-bold">ویرایش کاربر وبسایت</span>
                        </div>
                        @foreach($users as $user)
                            <form action="{{route('UsersEditSubmit')}}" class="mx-auto" method="post">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="card-body mx-auto ">
                            <div class="flex flex-col w-full lg:flex-row">
                                <div class="">
                                    <label class="form-control w-full max-w-xs">
                                        <div class="label">
                                            <span class="label-text">نام کاربر را وارد کنید</span>
                                            <span class="label-text-alt badge badge-primary text-light">مهم</span>
                                        </div>
                                        <input type="text" name="name" value="{{$user->name}}" class="input input-bordered w-full max-w-xs" />
                                    </label>
                                </div>
                                <div class="divider lg:divider-horizontal"></div>
                                <div class="">
                                    <label class="form-control w-full max-w-xs">
                                        <div class="label">
                                            <span class="label-text">ایمیل کاربر را وارد کنید</span>
                                            <span class="label-text-alt badge badge-primary text-light">مهم</span>
                                        </div>
                                        <input type="text" name="email" value="{{$user->email}}" class="input input-bordered w-full max-w-xs" />
                                    </label>
                                </div>
                            </div>
                            <label class="form-control w-full max-w-xs mx-auto">
                                <div class="label">
                                    <span class="label-text">سطح دسترسی</span>
                                    @if($user->isAdmin == 1)
                                        <span class="label-text-alt badge badge-neutral text-light">ادمین اصلی</span>
                                    @endif
                                    @if($user->isAdmin == 0)
                                        <span class="label-text-alt badge badge-default text-dark">کاربر عادی</span>
                                    @endif

                                </div>
                                <select name="isAdmin" class="select w-full max-w-xs @if($user->id == auth()->id() AND $user->isAdmin == 1) select-error @endif">

                                    @if($user->id == auth()->id() AND $user->isAdmin == 1)
                                        <option disabled selected>اجازه تغییر سطح دسترسی خود را ندارید!</option>
                                    @else
                                        <option disabled selected>انتخاب کنید</option>
                                        <option value="0">کاربر عادی</option>
                                        <option value="1">ادمین</option>
                                    @endif

                                </select>
                            </label>
                            <label class="form-control w-full max-w-xs mx-auto">
                                <div class="label">
                                    <span class="label-text">آدرس اصلی کاربر را وارد کنید</span>
                                    <span class="label-text-alt badge badge-warning text-light">اختیاری</span>
                                </div>
                                <input type="text" name="address" value="{{$user->address}}" class="input input-bordered w-full max-w-xs" />
                            </label>
                            <div class="flex w-full">
                                <div class="">
                                    <label class="form-control w-full max-w-xs">
                                        <div class="label">
                                            <span class="label-text">کد پستی کاربر را وارد کنید</span>
                                            <span class="label-text-alt badge badge-warning text-light">اختیاری</span>
                                        </div>
                                        <input type="text" name="postalcode" value="{{$user->postalcode}}" class="input input-bordered w-full max-w-xs" />
                                    </label>
                                </div>
                                <div class="divider divider-horizontal"></div>
                                <div class="">
                                    <label class="form-control w-full max-w-xs">
                                        <div class="label">
                                            <span class="label-text">شماره تماس کاربر را وارد کنید</span>
                                            <span class="label-text-alt badge badge-warning text-light">اختیاری</span>
                                        </div>
                                        <input type="text" name="phone" value="{{$user->phone}}" class="input input-bordered w-full max-w-xs" />
                                    </label>
                                </div>
                            </div>
                        </div>
                            <div class="card-footer bg-white">
                                <button class="btn btn-wide btn-success float-start text-light">ثبت اطلاعات</button>
                                <a href="{{route('UsersSettings')}}" class="btn btn-wide btn-error float-end text-light">لغو عملیات</a>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
