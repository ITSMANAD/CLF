@extends('admin.partials.master')
@section('title', 'وبلاگ - لیست نوشته ها')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">لیست نوشته ها</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item active">لیست نوشته ها</li>
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
                        <i class="fa fa-exclamation-triangle"></i>
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
                    <div class="overflow-x-auto">
                        <table class="table">
                            <!-- head -->
                            <thead>
                            <tr>

                                <th>تصویر شاخص</th>
                                <th>عنوان</th>
                                <th>تاریخ انتشار</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- row 1 -->
                            @foreach($BlogPosts as $Post)
                            <tr>

                                <td>
                                    <div class="">
                                        <div class="">
                                            <img src="{{$Post->thumbnail}}" style="height: 82px" class="img-thumbnail" alt="thumbnail" />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex items-center gap-3">

                                        </div>
                                        <div>
                                            <div class="font-bold">{{$Post->title}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex items-center gap-3">

                                    </div>
                                    <div>
                                        <div class="font-bold">{{jdate($Post->created_at)->ago()}}</div>
                                    </div>
                                    </div>
                                </td>
                                <td>
                                    @if($Post->status == 1)
                                        <span class="badge badge-success">فعال</span>
                                    @endif
                                    @if($Post->status == 0)
                                            <span class="badge badge-error">غیر فعال</span>
                                    @endif
                                </td>
                                <th>
                                    <form action="{{route('BlogDeletePost')}}" class="mb-1" method="post">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="id" value="{{$Post->id}}">
                                        <button class="btn btn-error btn-xs">حذف</button>
                                    </form>
                                    <a href="posts/edit/{{$Post->id}}" class="btn btn-warning btn-xs">ویرایش</a>
                                </th>
                            </tr>
                    @endforeach

                            </tbody>
                            <!-- foot -->
                            <tfoot>
                            <tr>
                                <th>تصویر شاخص</th>
                                <th>عنوان</th>
                                <th>تاریخ انتشار</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
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
