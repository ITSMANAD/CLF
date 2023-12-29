@extends('admin.partials.master')
@section('title')
    لیست کاربران
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">لیست کاربران وبسایت</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item active">لیست کاربران</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="">
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
                    <!-- /.col-md-6 -->
                    <div class="overflow-x-auto">
                        <table class="table">
                            <!-- head -->
                            <thead>
                            <tr>
                                <th>
                                    <label>
                                        <input type="checkbox" class="checkbox" />
                                    </label>
                                </th>
                                <th>نام و نام خانوادگی</th>
                                <th>ایمیل</th>
                                <th>سطح دسترسی</th>
                                <th class="text-center">تاریخ ثبت نام</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- row 1 -->
                            @foreach($users as $user)
                            <tr>
                                <th>
                                    <label>
                                        <input type="checkbox" class="checkbox" />
                                    </label>
                                </th>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="avatar">
                                            <div class="mask mask-squircle w-12 h-12">
                                                <img src="/assets/img/user.jpg" alt="User Image" />
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold">{{$user->name}}</div>
                                            <div class="text-sm opacity-50">{{$user->phone}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td >@if($user->isAdmin == 1) <span class="badge badge-neutral">ادمین اصلی</span> @endif @if($user->isAdmin == 0) <span class="badge badge-primary">کاربر عادی</span> @endif</td>
                                <td class="text-center">
                                    {{jdate($user->created_at)->ago()}} <br>
                                    <span class="badge badge-ghost badge-sm">{{jdate($user->created_at)->format('%d %B %Y')}}</span>
                                </td>
                                <th>
                                    <a href="users/{{$user->id}}" class="btn btn-warning btn-xs">ویرایش</a>
                                    <a href="users/details/{{$user->id}}" class="btn btn-info btn-xs">مشاهده</a>
                                </th>
                            </tr>
                            @endforeach
                            </tbody>
                            <!-- foot -->
                            <tfoot>
                            <tr>
                                <th></th>
                                <th>نام و نام خانوادگی</th>
                                <th>ایمیل</th>
                                <th>سطح دسترسی</th>
                                <th class="text-center">تاریخ ثبت نام</th>
                                <th></th>
                            </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
