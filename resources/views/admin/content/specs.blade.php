@extends('admin.partials.master')
@section('title','تنظیم مشخصات محصولات')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">تنظیم مشخصات محصولات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                        <li class="breadcrumb-item "><a href="{{route('ShopProducts')}}">فروشگاه</a></li>
                        <li class="breadcrumb-item ">تنظیم مشخصات محصولات</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach($Products as $Product)
                <div class="col">
                    <div class="card w-96 bg-base-100 shadow-xl">
                        @php
                        $Product_Gallery = \App\Models\Products_Gallery::all()->whereIn('PID',$Product->id)->first();
                        $Product_Specs = \App\Models\Products_Specs::all()->whereIn('PID',$Product->id);
                        @endphp
                        <figure><img src="{{$Product_Gallery->image}}" alt="{{$Product_Gallery->alt}}" /></figure>
                        <div class="card-body">
                            <h2 class="card-title">{{$Product->name}}</h2>
                            <p>{{substr($Product->intro, 0,250)}}.....</p>
                            <div class="border-1 rounded-4">
                                <ul class="list-group list-group-flush">
                                    @if(count($Product_Specs) >0)
                                        @foreach($Product_Specs as $Product_Spec)
                                            <li class="list-group-item">{{$Product_Spec->title}} : {{$Product_Spec->value}}</li>
                                        @endforeach
                                    @else
                                        <li class="list-group-item">مشخصاتی یافت نشد!</li>
                                    @endif

                                </ul>
                            </div>
                            <div class="card-actions justify-end">
                                <button class="btn btn-primary">ویرایش مشخصات</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection
