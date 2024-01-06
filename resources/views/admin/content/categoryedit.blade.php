
@extends('admin.partials.master')
@section('title', 'ویرایش دسته بندی')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            @if($type==0)
                                ویرایش دسته بندی
                                {{$Category['name']}}
                            @endif
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="{{route('CategorySettings')}}">دسته بندی ها</a></li>
                            <li class="breadcrumb-item"><a href="">ویرایش دسته بندی</a></li>
                            <li class="breadcrumb-item">{{$Category['name']}}</li>
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
                    <div id="alert" style="display: none;" class="alert alert-danger alert-dismissible">
                        <h5><i class="icon fa fa-ban"></i> خطا!</h5>
                        <p id="alert_text"></p>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{$Category['name']}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="CategoryUpdateOne">
                            @csrf
                            <input type="hidden" name="id" value="{{$Category['id']}}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nameinput">اسم دسته بندی</label>
                                    <input type="text" name="name" class="form-control" id="nameinput" value="{{$Category['name']}}">
                                </div>
                                <div class="form-group">
                                    <label for="nameinput">آدرس دسته بندی | نام_انتخابی/https://example.com/category</label>
                                    <input type="text" name="slug" class="form-control" id="nameinput" value="{{$Category['slug']}}">
                                </div>
                                <div class="form-group">
                                    <label for="descriptioninput">توضیحات سئو دسته بندی</label>
                                    <div class="mb-3">
                                        <input name="text" id="editor1" rows="10" cols="80">
                                        <script>
                                            CKEDITOR.replace('editor1');
                                            </script>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>انتشار به عنوان</label>
                                    <select name="status" class="form-control">
                                        <option @if($Category['status']==1) selected @endif value="1">فعال</option>
                                        <option @if($Category['status']==2) selected @endif value="2">حالت تعمیر</option>
                                        <option @if($Category['status']==0) selected @endif value="0">غیر فعال</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" onclick="CategoryUpdateOne()" class="btn btn-primary">ارسال</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>

@endsection
