@extends('admin.partials.master')
@section('title', 'ادمین - تنظیمات عمومی')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>تنظیمات عمومی</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}">داشبورد</a></li>
                            <li class="breadcrumb-item active">تنظیمات عمومی</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">ویرایش اطلاعات سایت</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="{{route('General.Update')}}">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputSname3" class="col-sm-2 control-label">نام وبسایت</label>

                                    <div class="col-sm-10">
                                        @foreach($Settings['setting'] as $setting)
                                        <input type="text" name="sname" class="form-control" id="inputsname3" placeholder="{{$setting['sname']}}">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputsdesc3" class="col-sm-2 control-label">توضیحات و سئو وبسایت</label>

                                    <div class="col-sm-10">
                                        <input name="sdescription" type="text" class="form-control" id="inputdesc3" placeholder="{{$setting['sdescription']}}">
                                    </div>


                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">تایید</button>

                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
