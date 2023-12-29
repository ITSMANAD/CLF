
@extends('admin.partials.master')
@section('title', 'دسته بندی ها')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">دسته بندی ها</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}">داشبورد</a></li>
                            <li class="breadcrumb-item active">دسته بندی ها</li>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">دسته بندی ها</h3>

                                <div class="card-tools ">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                        <div class="input-group-append">
                                            <a href="{{route('CategoryAdd')}}" class="btn btn-success "><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tbody><tr>
                                        <th>شماره</th>
                                        <th>اسم دسته بندی</th>
                                        <th>تاریخ ایجاد</th>
                                        <th>وضعیت</th>
                                        <th>لینک</th>
                                        <th>عملیات ها</th>
                                    </tr>
                                    @foreach($categories as $Category)
                                    <tr>
                                        <td>{{$Category['id']}}</td>
                                        <td>{{$Category['name']}}</td>
                                        <td>{{ jdate($Category->created_at)->format('%d %B %Y')  }}</td>
                                        <td><span class="badge @if($Category['status'] == '0') badge-danger @endif @if($Category['status'] == '1') badge-success @endif @if($Category['status'] == '2') badge-warning @endif">@if($Category['status'] == '0') غیرفعال @endif @if($Category['status'] == '1') فعال @endif @if($Category['status'] == '2') حالت تعمیر @endif</span></td>
                                        <td>{{$Category['slug']}}</td>
                                        <td>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <a href="/admin/categories/edit/{{$Category['id']}}" class="btn btn-outline-warning">ویرایش دسته بندی</a>
                                                    </div>
                                                    <div class="col-sm">
                                                        <form method="post" class="" action="categories/delete">
                                                            <button type="submit" class="btn btn-outline-danger">حذف دسته بندی</button>
                                                            @csrf
                                                            @method('patch')
                                                            <input type="hidden" name="id" value="{{$Category['id']}}">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody></table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">ساب منو (زیر دسته بندی)</h3>

                                <div class="card-tools ">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                        <div class="input-group-append">
                                            <a href="{{route('CategorySubAdd')}}" class="btn btn-success "><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tbody><tr>
                                        <th>شماره</th>
                                        <th>اسم زیر دسته بندی</th>
                                        <th>دسته بندی مادر</th>
                                        <th>تاریخ ایجاد</th>
                                        <th>وضعیت</th>
                                        <th>لینک</th>
                                        <th>عملیات ها</th>
                                    </tr>
                                    @foreach($subcategories as $Category)
                                        <tr>
                                            <td>{{$Category['id']}}</td>
                                            <td>{{$Category['name']}}</td>
                                            @php
                                                $categoryid = $Category['category'];
                                                $categoryname = \App\Models\Category::all()->whereIn('id',$categoryid);
                                            @endphp
                                            <td>
                                                @foreach($categoryname as $name)
                                                    {{$name['name']}}
                                                @endforeach
                                            </td>
                                            <td>{{jdate($Category->created_at)->format('%d %B %Y')}}</td>
                                            <td><span class="badge @if($Category['status'] == '0') badge-danger @endif @if($Category['status'] == '1') badge-success @endif @if($Category['status'] == '2') badge-warning @endif">@if($Category['status'] == '0') غیرفعال @endif @if($Category['status'] == '1') فعال @endif @if($Category['status'] == '2') حالت تعمیر @endif</span></td>
                                            <td>{{$Category['slug']}}</td>
                                            <td>

                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-sm">
                                                                <a href="/admin/categories/edit/sub/{{$Category['id']}}" class="btn btn-outline-warning">ویرایش دسته بندی</a>
                                                            </div>
                                                            <div class="col-sm">
                                                                <form method="post" class="" action="categories/delete/sub">
                                                                    <button type="submit" class="btn btn-outline-danger">حذف دسته بندی</button>
                                                                    @csrf
                                                                    @method('patch')
                                                                    <input type="hidden" name="id" value="{{$Category['id']}}">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody></table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> مگا منو ها</h3>

                                <div class="card-tools ">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                        <div class="input-group-append">
                                            <a href="{{route('CategoryMegaAdd')}}" class="btn btn-success "><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tbody><tr>
                                        <th>شماره</th>
                                        <th>اسم زیر دسته بندی</th>
                                        <th>تاریخ ایجاد</th>
                                        <th>وضعیت</th>
                                        <th>لینک</th>
                                        <th>دسته بندی اصلی + زیر دسته بندی مادر</th>
                                        <th>عملیات ها</th>
                                    </tr>
                                    @foreach($megacategories as $Category)
                                        <tr>
                                            <td>{{$Category['id']}}</td>
                                            <td>{{$Category['name']}}</td>
                                            <td>{{jdate($Category->created_at)->format('%d %B %Y')}}</td>
                                            <td><span class="badge @if($Category['status'] == '0') badge-danger @endif @if($Category['status'] == '1') badge-success @endif @if($Category['status'] == '2') badge-warning @endif">@if($Category['status'] == '0') غیرفعال @endif @if($Category['status'] == '1') فعال @endif @if($Category['status'] == '2') حالت تعمیر @endif</span></td>
                                            <td>{{$Category['slug']}}</td>
                                            @php
                                                $categoryid = $Category['category'];
                                                $subcategoryid = $Category['subcategory'];
                                                $categoryname = \App\Models\Category::all()->whereIn('id',$categoryid);
                                                $subcategoryname = \App\Models\SubCategory::all()->whereIn('id',$subcategoryid);

                                            @endphp
                                            <td>
                                                @foreach($categoryname as $name)
                                                    {{$name['name']}} +
                                                    @foreach($subcategoryname as $subname)
                                                        {{$subname['name']}}
                                                    @endforeach
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <a href="/admin/categories/edit/mega/{{$Category['id']}}" class="btn btn-outline-warning">ویرایش دسته بندی</a>
                                                        </div>
                                                        <div class="col-sm">
                                                            <form method="post" class="" action="categories/delete/mega">
                                                                <button type="submit" class="btn btn-outline-danger">حذف دسته بندی</button>
                                                                @csrf
                                                                @method('patch')
                                                                <input type="hidden" name="id" value="{{$Category['id']}}">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody></table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
