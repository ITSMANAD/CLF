@extends('admin.partials.master')
@section('title','ادمین - افزودن پست')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">افزودن پست جدید</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item active">وبلاگ</li>
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
                    <div class="col-md-9 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 border-0">
                                        <h4>مطلب جدید</h4>
                                    </div>
                                </div>
                                <hr>

                                    <div id="alert" style="display: none;" role="alert" class="alert alert-danger">
                                        <i class="stroke-current shrink-0 h-6 w-6 fa fa-exclamation-triangle"></i>
                                        <span>


                                                    <li id="alert_text"></li>

                                            </span>
                                    </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <form  action="{{route('BlogNewPostSubmit')}}" method="post">
                                            @method('patch')
                                            @csrf
                                            <div class="form-group row">
                                                <label for="text" class="col-12 col-form-label">موضوع را وارد کنید</label>
                                                <div class="col-12">
                                                    <input id="text" name="title" placeholder="موضوع" class="form-control here" required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="text" class="col-12 col-form-label">  آدرس را وارد کنید<span class="badge badge-info">مانند : wordpress</span></label>
                                                <div class="col-12">
                                                    <input id="text" name="slug" placeholder="آدرس نوشته" class="form-control here" required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="text" class="col-12 col-form-label">کلمه کلیدی پرتکرار برای سئو وارد کنید!</label>
                                                <div class="col-12">
                                                    <input id="text" name="tags" placeholder="مانند : لاراول" class="form-control here" required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="textarea" class="col-12 col-form-label">محتوای پست</label>
                                                <div class="col-12">

                                                <textarea name="text" id="editor1" rows="10" cols="80">

                                                </textarea>
                                                    <script>
                                                        // Replace the <textarea id="editor1"> with a CKEditor 4
                                                        // instance, using default configuration.
                                                        CKEDITOR.replace( 'editor1' );
                                                    </script>
                                                </div>
                                            </div>

                                    </div>
                                    <div class="col-md-4  ">
                                        <div class="card border-1 shadow-md mb-3" style="max-width: 18rem;">
                                            <div class="card-header border-0 bg-white ">انتشار</div>
                                            <div class="card-body">

                                            </div>
                                            <div class="card-footer border-0 bg-white">

                                                <button type="submit" class="btn btn-warning btn-sm">انتشار  به عنوان پیش نویس</button>
                                            </div>
                                        </div>
                                        <div class="card border-1 mb-3" style="max-width: 18rem;">
                                            <div class="card-header border-0 bg-white ">دسته بندی ها</div>
                                            <div class="card-body">

                                                    <div class="form-group row">
                                                        <label for="select" class="col-12 col-form-label">انتخاب دسته بندی</label>
                                                        <div class="">
                                                            <select id="select" name="category"  class="select select-bordered w-full max-w-xs" required="required">
                                                                @php
                                                                $Categories = \App\Models\BlogCategory::all();
                                                                @endphp
                                                                <option selected disabled>دسته بندی را انتخاب کنید</option>
                                                                @foreach($Categories as $Category)

                                                                    <option value="{{$Category->id}}">{{$Category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="card-footer border-0 bg-white">
                                                <a href="{{route('BlogCategory')}}" type="button" class="btn btn-info text-dark btn-sm">افزودن دسته بندی</a>
                                            </div>
                                        </div>
                                        <div class="card border-1 mb-3" style="max-width: 18rem;">
                                            <div class="card-header border-0 bg-white ">تصویر نوشته</div>
                                            <div class="card-body">
                                                <input name="thumbnail" type="file" accept=”image/*” class="file-input file-input-bordered  w-full max-w-xs" />

                                            </div>
                                    </div>
                                        </form>
                                </div>
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
