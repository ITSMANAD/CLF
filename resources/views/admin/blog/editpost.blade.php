@extends('admin.partials.master')
@section('title','ادمین - ویرایش نوشته')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">ویرایش نوشته</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item">وبلاگ</li>
                            <li class="breadcrumb-item active">ویرایش نوشته</li>
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
                        <div class=" ">
                            <div class="card">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-3 border-0">
                                            <h4>{{$BlogPost->title}}</h4>
                                        </div>
                                    </div>
                                    <hr>

                                    <div id="alert" style="display: none;" role="alert" class="alert alert-danger">
                                        <i class="stroke-current shrink-0 h-6 w-6 fa fa-exclamation-triangle"></i>
                                        <span>


                                                    <p id="alert_text"></p>

                                            </span>
                                    </div>

                                    <div class="row mx-auto">
                                        <div class="col-md-8">
                                            <form id="form">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$BlogPost->id}}">
                                                <div class="form-group row">
                                                    <label for="text" class="col-12 col-form-label">موضوع را وارد کنید</label>
                                                    <div class="col-12">
                                                        <input id="text" name="title" value="{{$BlogPost->title}}" class="form-control here" required="required" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="text" class="col-12 col-form-label">  آدرس <span class="badge badge-info">مانند : wordpress</span></label>
                                                    <div class="col-12">
                                                        <input id="text" disabled value="{{$BlogPost->slug}}" class="form-control here" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="description" class="col-12 col-form-label">  توضیحات کوتاه را وارد کنید</label>
                                                    <div class="col-12">
                                                    <textarea id="description" name="description" class="form-control here" required="required" type="text">
                                                    {{$BlogPost->description}}
                                                    </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="text" class="col-12 col-form-label">کلمه کلیدی پرتکرار برای سئو وارد کنید!</label>
                                                    <div class="col-12">
                                                        <input id="text" name="tags" value="{{$BlogPost->tags}}" class="form-control here" required="required" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="textarea" class="col-12 col-form-label">محتوای پست</label>
                                                    <div class="col-12">

                                                        <textarea name="text" id="editor1" rows="10" cols="80">
                                                            {{$BlogPost->text}}
                                                        </textarea>
                                                            <script>
                                                            // Replace the <textarea id="editor1"> with a CKEditor 4
                                                            // instance, using default configuration.
                                                            CKEDITOR.replace( 'editor1' );
                                                        </script>
                                                    </div>
                                                </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="card border-1 shadow-md mb-3" style="max-width: 18rem;">
                                                <div class="card-header border-0 bg-white ">انتشار</div>
                                                <div class="card-body">

                                                    <div class="form-group row">
                                                        <label for="status" class="col-12 col-form-label"> انتخاب وضعیت انتشار <span class="badge badge-info text-light">
                                                                @if($BlogPost->status ==0)
                                                                    غیر فعال
                                                                @endif
                                                                @if($BlogPost->status ==1)
                                                                    فعال
                                                                @endif
                                                            </span></label>
                                                        <div class="">
                                                            <select id="status" name="status"  class="select select-bordered w-full max-w-xs" required="required">
                                                                <option selected disabled>وضعیت انتشار را انتخاب کنید</option>
                                                                <option value="0">غیر فعال</option>
                                                                <option value="1">فعال</option>


                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer border-0 bg-white">

                                                    <button type="button" onclick="submitForm()" class="btn btn-success btn-sm">انتشار نوشته</button>
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

                                                                    <option @if($Category->id == $BlogPost->category) selected @endif value="{{$Category->id}}">{{$Category->name}}</option>
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
                                                    <img src="{{$BlogPost->thumbnail}}" class="img-thumbnail" alt="Post Image">
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
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <script src="/js/ax-editpost.js"></script>
@endsection
