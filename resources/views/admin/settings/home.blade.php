@extends('admin.partials.master')
@section('title','ادمین - تنظیمات صفحه اصلی')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ویرایش صفحه اول</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}">داشبورد</a></li>
                            <li class="breadcrumb-item active">تنظیمات</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="alert alert-info alert-dismissible">
                    <h5><i class="icon fa fa-info"></i> توجه!</h5>
                    <a href="#">
                        برای دیدن آموزش نحوه ویرایش بنر ها کلیک کنید!
                    </a>
                </div>
                <br>
                <div class="col-12">
                    <!-- Custom Tabs -->
                    <div class="card">
                        <div class="card-header d-flex p-0">
                            <h3 class="card-title p-3">ویرایش منو ها</h3>
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item"><a class="nav-link active show" href="#tab_1" data-toggle="tab">H1</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">H2</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">H3</a></li>

                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="tab_1">
                                    <label for="img1" class="text-right">بنر فعلی :</label>
                                    @php
                                    $h1 = \App\Models\Banners::all()->whereIn('blocation','h1');
                                    @endphp
                                    @foreach($h1 as $banner)
                                    <img id="img1" src="{{$banner['bimage']}}" class="img-thumbnail" alt="...">
                                    @endforeach
                                    <br><br>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">آپلود بنر جدید</label>
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
     </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    <label for="img1" class="text-right">بنر فعلی :</label>
                                    @php
                                        $h2 = \App\Models\Banners::all()->whereIn('blocation','h2');
                                    @endphp
                                    @foreach($h2 as $banner)
                                        <img id="img1" src="{{$banner['bimage']}}" class="img-thumbnail" alt="...">
                                    @endforeach
                                    <br><br>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">آپلود بنر جدید</label>
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3">

                                    @php
                                        $h3 = \App\Models\Banners::all()->whereIn('blocation','h3');
                                    @endphp
                                    @foreach($h3 as $banner)
                                        <label for="img1" class="text-right">{{$banner['bname']}}<label>
                                        <img id="img1" src="{{$banner['bimage']}}" class="img-thumbnail p-3 m-3" alt="...">
                                    @endforeach


                                                <div class="position-relative mb-3 mt-3">

                                                    <label for="formFile" class="form-label">آپلود عکس جدید</label>
                                                    <input class="form-control" type="file" id="formFile">

                                                    <label for="formFile" class="form-label">alt عکس</label>
                                                    <input class="form-control" type="file" id="formFile">

                                                </div>
                                </div>

                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- ./card -->
                </div>
            </div>
        </section>
    </div>
@endsection
