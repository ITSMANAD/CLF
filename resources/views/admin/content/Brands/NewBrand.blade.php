@extends('admin.partials.master')
@section('title','افزودن برند')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">افزودن برند</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item">فروشگاه</li>
                            <li class="breadcrumb-item active">افزودن برند</li>
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
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <div class="row">
                    <div class="card shadow">
                        <div class="card-header bg-white border-0">
                            <div class="card-title">افزودن</div>
                        </div>
                        <div class="card-body">
                            <div class="grid gap-0 row-gap-3">
                                <form enctype="multipart/form-data" action="{{route('ShopBrandsAddStore')}}" method="post">
                                    @csrf
                                    @method('patch')
                                <div class="mb-3">
                                    <label for="name" class="form-label">نام برند</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="نام برند را وارد کنید">
                                </div>
                                <div class="mb-3">
                                    <label for="slug" class="form-label">آدرس برند</label>
                                    <input type="text" name="slug" class="form-control" id="slug" placeholder="آدرس برند را وارد کنید">
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">تصویر برند</label><br>
                                    <input type="file" accept="image/*" name="image" id="image" class="file-input file-input-bordered file-input-info w-full max-w-xs" />
                                </div>
                                <div class="form-group row">
                                    <label for="textarea" class="col-12 col-form-label">محتوای پست</label>
                                    <div class="col-12">
                                        <textarea name="text" id="editor1" cols="30" rows="10"></textarea>
                                        <script>
                                            // Replace the <textarea id="editor1"> with a CKEditor 4
                                            // instance, using default configuration.
                                            CKEDITOR.replace( 'editor1' );
                                        </script>
                                    </div>
                                </div>
                                    <button class="btn btn-wide btn-neutral text-light">ثبت اطلاعات</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
