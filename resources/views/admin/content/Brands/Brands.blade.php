@extends('admin.partials.master')
@section('title','برند ها')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">لیست برند ها</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item">فروشگاه</li>
                            <li class="breadcrumb-item active">برند ها</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="container-fluid">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <h5><i class="icon fa fa-ban"></i> خطا!</h5>
                        {{ session('error') }}
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
                    <div class="overflow-x-auto">
                        <table class="table text-center">
                            <!-- head -->
                            <thead>
                            <tr>
                                <th></th>
                                <th>تصویر</th>
                                <th>عنوان</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Brands as $Brand)
                            <tr>
                                <th>{{$Brand->id}}</th>
                                <td>
                                    <div class="avatar">
                                        <div class="w-24 rounded">
                                            <img src="{{$Brand->image}}" />
                                        </div>
                                    </div>
                                </td>
                                <td>{{$Brand->name}}</td>
                                <td>
                                    <div class="join ">
                                        <button class="btn join-item btn-warning">ویرایش</button>
                                        <form action="{{route('ShopBrandsDelete')}}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="id" class="hidden" value="{{$Brand->id}}">
                                            <button class="btn join-item btn-error">حذف</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
