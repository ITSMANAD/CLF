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
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mt-5 fs-4">
                                            <span>قیمت اصلی :</span><span class="text-decoration-line-through me-2 text-secondary"> {{number_format($Product_Price->price)}} تومان </span><br>
                                            <span>قیمت شگفت انگیز  :</span><span class="text-success">{{number_format($Product_Price->amazing_price)}} تومان </span>
                                        </div>
                                        @php
                                        $Product_Inventory = \App\Models\products_inventory::all()->whereIn('PID',$Product->id)->first();
                                        @endphp
                                        <p class="fw-bold underline">تعداد محصول در انبار : {{$Product_Inventory->number}} عدد </p>
                                        <br>
                                        <button class="btn shadow-md text-light" style="border-radius: 15px;font-size: 12px;background-color: #FF4961;">مشاهده محصول در فروشگاه</button>
                                    </div>
                                    @php
                                        $Product_Brand = \App\Models\Brands::all()->whereIn('id',$Product->brand)->first();
                                    @endphp
                                    <div class="col-sm-7 mx-auto">
                                        <div class="card w-96 bg-base-100 shadow-xl image-full img-fluid">
                                            <figure><img src="{{$Product_Brand->image}}" alt="Shoes" /></figure>
                                            <div class="card-body container">
                                                <h2 class="card-title">{{$Product_Brand->name}}</h2>
                                                <p style="color: rgba(255,255,255,0.77)">{{strip_tags($Product_Brand->description)}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mt-5 fs-4">
                                            <span>قیمت :</span><span class=" me-2 text-success"> {{number_format($Product_Price->price)}} تومان </span><br>
                                        </div>
                                        @php
                                            $Product_Inventory = \App\Models\products_inventory::all()->whereIn('PID',$Product->id)->first();
                                        @endphp
                                        <p class="fw-bold underline">تعداد محصول در انبار : {{$Product_Inventory->number}} عدد </p>
                                        <br>
                                        <button class="btn shadow-md text-light"  style="border-radius: 15px;font-size: 12px;background-color: #FF4961;">مشاهده محصول در فروشگاه</button>
                                    </div>
                                    @php
                                    $Product_Brand = \App\Models\Brands::all()->whereIn('id',$Product->brand)->first();
                                    @endphp
                                    <div class="col-sm-7 mx-auto">
                                        <div class="card w-96 bg-base-100 shadow-xl image-full img-fluid">
                                            <figure><img src="{{$Product_Brand->image}}" alt="Shoes" /></figure>
                                            <div class="card-body container">
                                                <h2 class="card-title">{{$Product_Brand->name}}</h2>
                                                <p style="color: rgba(255,255,255,0.77)">{{strip_tags($Product_Brand->description)}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <br>
                        </div>
                    </div>
                </div>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                معرفی محصول
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                @php
                                echo $Product->description;
                                @endphp
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                مشخصات محصول
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <table class="table">

                                    <tbody>
                                    @php
                                    $Product_Specs = \App\Models\Products_Specs::all()->whereIn('PID',$Product->id);
                                    @endphp
                                    @foreach($Product_Specs as $Product_Spec)
                                    <tr>
                                        <td>{{$Product_Spec->title}}</td>
                                        <td>{{$Product_Spec->value}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
