@extends('admin.partials.master')
@section('title','ادمین - ویرایش بنر')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">ویرایش بنر</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="{{route('HomeSettings')}}">ویرایش صفحه اصلی</a></li>
                            <li class="breadcrumb-item active">ویرایش بنر</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="container">
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
        </div>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <section class="card">
                    <div class="card-header">
                        <h4 class="card-title">ویرایش بنر </h4>
                    </div>
                    <div id="alert" style="display: none;" role="alert" class="alert alert-danger">
                        <i class="stroke-current shrink-0 h-6 w-6 fa fa-exclamation-triangle"></i>
                        <span>


                                                    <p id="alert_text"></p>

                                            </span>
                    </div>
                    <br>
                    <div id="main-card" class="card-content">
                        <div class="card-body">
                            <div class="col-12 col-md-10 offset-md-1">
                                <img src="{{$Img->bimage}}" class="img-thumbnail w-50 h-50 m-4">
                                <form class="form" id="banner-edit-form">
                                    @csrf
                                    <input type="hidden" name="id" id="" value="{{$Img->id}}">
                                            <div class="row">
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <label>تصویر</label>
                                                    <div class="custom-file">
                                                        <input id="image" type="file" accept="image/*" name="bimage" class="custom-file-input">
                                                        <label class="custom-file-label text-left" for="image">{{$Img->bimage}}</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>لینک <small>(اختیاری)</small></label>
                                                    <input type="text" class="form-control banner-link ltr ui-autocomplete-input" name="blink" value="{{$Img->blink}}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>عنوان <small>(اختیاری)</small></label>
                                                    <input type="text" @if($Img->bname == "active") disabled @endif class="form-control  @if($Img->bname == "active") disabled @endif" name="bname" value="@if($Img->bname == "acitve")  @else {{$Img->bname}} @endif">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>گروه</label>
                                                    <select class="form-control" name="blocation">

                                                        <option value="h1" selected="">اسلایدر بزرگ 436*872</option>
                                                        <option value="h2">بنر های کوچک کنار اسلایدر بزرگ 212*424</option>
                                                        <option value="h3">بنر پهن 167*1320</option>
                                                        <option value="h4">بنر های چهارتایی 234*312</option>

                                                    </select>
                                                </div>
                                            </div>



                                        </div>

                                        <div class="row">
                                            <div class="col-12 text-right">
                                                <button type="button" onclick="bannereditform()" class="btn btn-success mr-1 mb-1">
                                                    ویرایش بنر
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                            </div>


                        </div>
                    </div>
                </section>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
