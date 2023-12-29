@extends('admin.partials.master')
@section('title', 'ادمین')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                    <div class="">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">خانه</li>

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
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-light shadow-lg rounded-3 p-2">
                                <div class="inner">
                                    <h3>{{$CountUsers}} </h3>

                                    <p>تعداد کاربران</p>
                                </div>
                                <a href="{{route('UsersSettings')}}" class="small-box-footer bg-light">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-light shadow-lg rounded-3 p-2">
                                <div class="inner">
                                    <h3>0</h3>

                                    <p>تعداد محصولات</p>
                                </div>

                                <a href="#" class="small-box-footer bg-light">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-light shadow-lg rounded-3 p-2">
                                <div class="inner">
                                    <h3>0</h3>

                                    <p>تعداد سفارشات</p>
                                </div>

                                <a href="#" class="small-box-footer bg-light">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-light shadow-lg rounded-3 p-2">
                                <div class="inner">
                                    <h3>۶۵</h3>

                                    <p>جمع فروش</p>
                                </div>

                                <a href="#" class="small-box-footer bg-light">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
