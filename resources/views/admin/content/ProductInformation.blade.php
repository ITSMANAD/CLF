@extends('admin.partials.master')
@section('title','جزییات محصول')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">جزییات محصول </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="{{route('ShopProducts')}}">فروشگاه</a></li>
                            <li class="breadcrumb-item active">{{$Product->name}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div dir="ltr" class="col-sm-3">
                        <div id="carousel" class="carousel slide">
                            <div class="carousel-inner">
                                @php
                                $Product_Gallerys = \App\Models\Products_Gallery::all()->whereIn('PID',$Product->id);
                                @endphp
                                @foreach($Product_Gallerys as $Gallery)
                                <div class="carousel-item ">
                                    <img src="{{$Gallery->image}}" class="d-block w-100 rounded-5" alt="{{$Gallery->alt}}">
                                </div>
                                @endforeach
                            </div>
                            <button dir="ltr" class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>

                        </div>
                    </div>
                    <div class="col-sm-9 mt-1">
                    <h3 class="fs-2 fw-bold">موضوع : {{$Product->name}}</h3>
                        <div class="m-4">
                        <label for="intro">توضیحات کوتاه محصول :</label>
                        <p id="intro" class=" text-break">{{$Product->intro}}</p>
                           @php
                           $Product_Price = \App\Models\Products_Price::all()->whereIn('PID',$Product->id)->first();
                           @endphp
                            @if($Product_Price->in_amazing == 1)
                                <div class="mt-5 fs-4">
                                    <span>قیمت اصلی :</span><span class="text-decoration-line-through me-2 text-secondary"> {{number_format($Product_Price->price)}} تومان </span><br>
                                    <span>قیمت شگفت انگیز  :</span><span class="text-success">{{number_format($Product_Price->amazing_price)}} تومان </span>
                                </div>
                            @else
                                <div class="mt-5 fs-4">
                                    <span>قیمت :</span><span class=" me-2 text-success"> {{number_format($Product_Price->price)}} تومان </span><br>
                                </div>

                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
