@extends('admin.partials.master')
@section('title','تنظیمات نمایش')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">تنظیمات نمایش</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item active">تنظیمات نمایش</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="container-fluid">
                <a href="{{route('RefreshThemes')}}" class="btn btn-active btn-accent text-light">بروزرسانی تم ها</a>
                <div class="row">
                    @php
                        $ViewsPath = resource_path('views/Themes');
                        use Illuminate\Support\Facades\File;
                        use Illuminate\Support\Facades\Storage;
                        $viewFiles = File::directories($ViewsPath);
                    @endphp
                    @foreach($viewFiles as $fileName)
                        @php
                        $DirName = basename($fileName);
                        $Files = File::files($fileName);
                        $Count = count($Files);
                        @endphp
                        <div class="card w-96 bg-base-100 shadow-xl m-2">
                            <figure><img src="{{asset($DirName.'/preview.png')}}" alt="Shoes"/></figure>
                            <div class="card-body">
                                <h2 class="card-title">
                                    {{$DirName}}
                                    @if(CheckThemeStatus($DirName))
                                        <div class="badge badge-success">فعال</div>
                                    @endif
                                </h2>
                                <p>برای تغییر وضعیت تم از بین دکمه های زیر انتخاب کنید!</p>
                                <div class="card-actions justify-end">
                                    <div class="badge badge-outline">فایل ها : {{$Count}}</div>
                                </div>
                                <button class="btn btn-error">حذف تم</button>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
