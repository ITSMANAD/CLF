@extends('admin.partials.master')
@section('title','تنظیمات فروشگاه')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">تنظیمات فروشگاه</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item active">فروشگاه</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="container">
                    <div id="alert" style="display: none;" class="alert alert-danger alert-dismissible">
                        <h5><i class="icon fa fa-ban"></i> خطا!</h5>
                        <p id="alert_text"></p>
                    </div>
                    <div class="container">
                        <div id="success" style="display: none;" class="alert alert-success alert-dismissible">
                            <h5><i class="icon fa fa-check"></i>موفق!</h5>
                            <p id="alert_text">عملیات با موفقیت انجام شد!</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form method="post" id="ShopSettings">
                        @csrf
                    <div class="card bg-white ">
                        <div class="card-body">
                            <h1 class="fs-4">تنظیمات قیمت</h1>
                            <div class="grid gap-3">
                                <div class="flex w-full ">
                                    <div class="grid h-20 flex-grow bg-base-300 rounded-box bg-white">
                                        <div class="mb-3">
                                            <label for="select" class="form-label">ارز پیش فرض</label>
                                            <select name="currency" id="select" class="select select-bordered w-full max-w-xs">
                                                <option value="Toman" selected>تومان (پیش فرض)</option>
                                                <option value="USD" >دلار USD</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <h1 class="fs-4">تنظیمات فاکتور سفارشات</h1>
                            <div class="flex w-full">
                                <div class="grid h-20 flex-grow  bg-base-300 rounded-box bg-white">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">عنوان فاکتور</label>
                                        <input type="text" class="form-control text-start" id="title" name="title" placeholder="عنوان">
                                    </div>
                                </div>
                                <div class="divider divider-horizontal"></div>
                                <div class="grid h-20 flex-grow  bg-base-300 rounded-box bg-white">
                                    <div class="mb-3">
                                        <label for="Seller" class="form-label">فروشنده</label>
                                        <input type="text" class="form-control text-start" id="Seller" name="Seller" placeholder="فروشنده">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <input class="btn btn-accent" onclick="ShopSettings()" value="ثبت اطلاعات" type="button">
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
