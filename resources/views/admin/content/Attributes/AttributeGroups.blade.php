@extends('admin.partials.master')
@section('title','لیست ویژگی ها')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">لیست ویژگی ها</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item active">لیست ویژگی ها</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="container-fluid">
            @if(session('success'))
                    <div class="container mt-5">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">موفق</h4>
                            <p>{{session('success')}}</p>
                            <hr>
                        </div>
                    </div>
            @endif
                @if(session('error'))
                    <div class="container mt-5">
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">خطا</h4>
                            <p>{{session('error')}}</p>
                            <hr>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="card bg-white shadow" style="border-right: 16px!important;">
                        <div class="card-header bg-white">
                            <div class="card-title border-0 fs-6">
                                فیلتر کردن
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="title" class="form-label">عنوان</label>
                                    <input type="text" class="form-control w-75" id="title" placeholder="عنوان را وارد کنید!">
                                </div>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <button type="button" style="background-color: #179301;width: 110px;height: 40px" class="btn float-left text-white" >فیلتر کردن</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-white shadow" style="border-right: 16px!important;">
                        <div class="card-header bg-white">
                            <div class="card-title border-0 fs-6">
                                لیست
                            </div>
                            <div class="card-tools">
                                <a href="{{route('ShopAttributeGroupsAdd')}}" class="btn btn-accent btn-sm text-white">اضافه کردن گروه ویژگی</a>
                            </div>
                            <div class="card-body">
                                <div class="overflow-x-auto">
                                    <table class="table">
                                        <!-- head -->
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>عنوان</th>
                                            <th class="text-center">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($attributes as $attribute)
                                        <tr>
                                            <th>{{$attribute->id}}</th>
                                            <td>{{$attribute->name}}</td>
                                            <td class="text-center">
                                                <div class="join text-white">
                                                    <button class="btn join-item btn-success">مشاهده مقادیر</button>
                                                    <a href="attributeGroups/edit/{{$attribute->id}}" class="btn join-item btn-warning ">ویرایش</a>
                                                    <form action="{{route('ShopAttributeGroupsDelete')}}" method="post">
                                                        @method('put')
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$attribute->id}}">
                                                        <input value="حذف" type="submit" class="btn join-item btn-error" style="background-color:#EF4C53;">
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer bg-white border-0 mt-3">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
