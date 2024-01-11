@extends('layouts.master')
@section('title')
{{-- ViewComposerServiceProvider.php | And You Can Edit This in this File  --}}
@foreach ($Settings['setting'] as $setting)
     {{ $setting['sname'] }}
@endforeach
@endsection

@section('content')

<main class="main default">
    <div class="container">
        <!-- banner -->
        <div class="row index-main-slider ">

            <aside class="sidebar col-lg-4 hidden-md order-2 hidden-md">
                <!-- Start banner -->
                <div class="sidebar-inner dt-sl">
                    <div class="sidebar-banner">
                        <div class="row w-75 h-75">
                            @foreach($h2 as $banner)
                            <div class="col-12 mb-1">
                                <div class="widget-banner">
                                    <a href="{{$banner->blink}}">
                                        <img src="{{$banner->bimage}}" alt="{{$banner->balt}}">
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- End banner -->
            </aside>

            <div class="col-lg-8 col-md-12 order-1" >
                <!-- Start main-slider -->
                <section id="main-slider" class="main-slider main-slider-cs mt-1 carousel slide carousel-fade card hidden-sm" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($h1 as $banner)
                        <li data-target="#main-slider" data-slide-to="{{$banner->balt}}" class="@if($banner->bname == "active") active @endif"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($h1 as $banner)
                        <div class="carousel-item @if($banner->bname == "active") active @endif">
                            <a class="main-slider-slide" href="{{$banner->blink}}">
                                <img src="{{$banner->bimage}}" class="img-fluid">
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#main-slider" role="button" data-slide="prev">
                        <i class="mdi mdi-chevron-right"></i>
                    </a>
                    <a class="carousel-control-next" href="#main-slider" data-slide="next">
                        <i class="mdi mdi-chevron-left"></i>
                    </a>
                </section>

                <section id="main-slider-res" class="main-slider carousel slide carousel-fade card d-none show-sm" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($h1 as $banner)
                            <li data-target="#main-slider" data-slide-to="{{$banner->balt}}" class="@if($banner->bname == "active") active @endif"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($h1 as $banner)
                            <div class="carousel-item @if($banner->bname == "active") active @endif">
                                <a class="main-slider-slide" href="{{$banner->blink}}">
                                    <img src="{{$banner->bimage}}" class="img-fluid">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#main-slider-res" role="button" data-slide="prev">
                        <i class="mdi mdi-chevron-right"></i>
                    </a>
                    <a class="carousel-control-next" href="#main-slider-res" data-slide="next">
                        <i class="mdi mdi-chevron-left"></i>
                    </a>
                </section>
                <!-- End main-slider -->
            </div>
        </div>
        <!-- Special Product -->
        <div class="row">
            <div class="col-12">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <h3 class="card-title">
                            <span>محصولات تخفیف دار</span>
                        </h3>
                        <a href="#/" class="view-all">مشاهده همه</a>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2411px;"><div class="owl-item active" style="width: 334.313px; margin-left: 10px;"><div class="item">
                                        <a href="#/">
                                            <img src="assets/img/product-slider/60eb20-200x200.jpg" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#/">لپ تاپ ۱۱٫۶ اینچی دل مدل INSPIRON 3168 -AC B</a>
                                        </h2>
                                        <div class="price">
                                            <div class="text-center">
                                                <del><span>4,299,000<span>تومان</span></span></del>
                                            </div>
                                            <div class="text-center">
                                                <ins><span>4,180,000<span>تومان</span></span></ins>
                                            </div>
                                        </div>
                                    </div></div><div class="owl-item active" style="width: 334.313px; margin-left: 10px;"><div class="item">
                                        <a href="#/">
                                            <img src="assets/img/product-slider/4ff777-200x200.jpg" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#/">لپ تاپ ۱۴ اینچی دل مدل vostro 5471</a>
                                        </h2>
                                        <div class="price">
                                            <del><span>6,890,000<span>تومان</span></span></del>
                                            <ins><span>6,580,000<span>تومان</span></span></ins>
                                        </div>
                                    </div></div><div class="owl-item active" style="width: 334.313px; margin-left: 10px;"><div class="item">
                                        <a href="#/">
                                            <img src="assets/img/product-slider/35a2b8-200x200.jpg" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#/">لپ تاپ ۱۵ اینچی دل مدل Latitude 5580</a>
                                        </h2>
                                        <div class="price">
                                            <del><span>4,799,000<span>تومان</span></span></del>
                                            <ins><span>4,699,000<span>تومان</span></span></ins>
                                        </div>
                                    </div></div><div class="owl-item active" style="width: 334.313px; margin-left: 10px;"><div class="item">
                                        <a href="#/">
                                            <img src="assets/img/product-slider/9b3da9-200x200.jpg" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#/">لپ تاپ ۱۵ اینچی دل مدل INSPIRON 15-3567 - I</a>
                                        </h2>
                                        <div class="price">
                                            <span>2,780,000<span>تومان</span></span>
                                        </div>
                                    </div></div><div class="owl-item" style="width: 334.313px; margin-left: 10px;"><div class="item">
                                        <a href="#/">
                                            <img src="assets/img/product-slider/c8297f-200x200.jpg" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#/">لپ تاپ ۱۵ اینچی دل مدل INSPIRON 7577 - D</a>
                                        </h2>
                                        <div class="price">
                                            <del><span>8,999,000<span>تومان</span></span></del>
                                            <ins><span>8,899,000<span>تومان</span></span></ins>
                                        </div>
                                    </div></div><div class="owl-item" style="width: 334.313px; margin-left: 10px;"><div class="item">
                                        <a href="#/">
                                            <img src="assets/img/product-slider/a579bb-200x200.jpg" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#/">لپ تاپ ۱۵ اینچی دل مدل Inspiron 15-5570 - B</a>
                                        </h2>
                                        <div class="price">
                                            <span>4,279,000<span>تومان</span></span>
                                        </div>
                                    </div></div><div class="owl-item" style="width: 334.313px; margin-left: 10px;"><div class="item">
                                        <a href="#/">
                                            <img src="assets/img/product-slider/19a2cc-200x200.jpg" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#/">لپ تاپ ۱۵ اینچی دل مدل XPS 15-9560</a>
                                        </h2>
                                        <div class="price">
                                            <span>18,450,000<span>تومان</span></span>
                                        </div>
                                    </div></div></div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i class="now-ui-icons arrows-1_minimal-right"></i></button><button type="button" role="presentation" class="owl-next"><i class="now-ui-icons arrows-1_minimal-left"></i></button></div><div class="owl-dots disabled"></div></div>
                </div>
            </div>
        </div>
        <section id="amazing-slider" class="carousel slide carousel-fade card" data-ride="carousel">
            <div class="row m-0">
                <ol class="carousel-indicators pr-0 d-flex flex-column col-lg-3">
                    <li class="" data-target="#amazing-slider" data-slide-to="0">
                        <span>لپ تاپ INSPIRON</span>
                    </li>
                    <li data-target="#amazing-slider" data-slide-to="1" class="">
                        <span>دل مدل 5471</span>
                    </li>
                    <li data-target="#amazing-slider" data-slide-to="2" class="">
                        <span>لپ تاپ ۱۵ اینچی</span>
                    </li>
                    <li data-target="#amazing-slider" data-slide-to="3" class="active">
                        <span>۱۵ اینچی دل</span>
                    </li>
                    <li data-target="#amazing-slider" data-slide-to="4" class="">
                        <span>لنوو مدل 310</span>
                    </li>
                    <li data-target="#amazing-slider" data-slide-to="5" class="">
                        <span>لپ تاپ لنوو</span>
                    </li>
                    <li data-target="#amazing-slider" data-slide-to="6">
                        <span>لپ تاپ ۱۵ اینچی</span>
                    </li>
                    <li data-target="#amazing-slider" data-slide-to="7">
                        <span>لپ تاپ ایسوس</span>
                    </li>
                    <li data-target="#amazing-slider" data-slide-to="8">
                        <span>ایسوس مدل A540UP - F</span>
                    </li>
                    <li class="view-all d-grid gap-2">
                        <a href="#/" class="btn btn-primary btn-block">
                            مشاهده همه شگفت انگیزها
                        </a>
                    </li>
                </ol>
                <div class="carousel-inner p-0 col-12 col-lg-9">
                    <img class="amazing-title" src="assets/img/amazing-slider/amazing-title-01.png" alt="">
                    <div class="carousel-item">
                        <div class="row m-0">
                            <div class="right-col col-5 d-flex align-items-center">
                                <a class="w-100 text-center" href="#/">
                                    <img src="assets/img/amazing-slider/60eb20-200x200.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="left-col col-7">
                                <div class="price">
                                    <del><span>4,299,000<span>تومان</span></span></del>
                                    <ins><span>4,180,000<span>تومان</span></span></ins>
                                    <span class="discount-percent">3 % تخفیف</span>
                                </div>
                                <h2 class="product-title">
                                    <a href="#/"> لپ تاپ ۱۱٫۶ اینچی دل مدل INSPIRON 3168 -AC B </a>
                                </h2>
                                <ul class="list-group">
                                    <li class="list-group-item">رنگ: مشکی</li>
                                    <li class="list-group-item">160 گیگابایت</li>
                                </ul>
                                <hr>
                                <div class="countdown-timer" countdown="20" data-date="05 02 2019 20:20:22">
                                    <span data-days="">0</span>:
                                    <span data-hours="">0</span>:
                                    <span data-minutes="">0</span>:
                                    <span data-seconds="">0</span>
                                </div>
                                <div class="timer-title">زمان باقی مانده تا پایان سفارش</div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row m-0">
                            <div class="right-col col-5 d-flex align-items-center">
                                <a class="w-100 text-center" href="#/">
                                    <img src="assets/img/amazing-slider/4ff777-200x200.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="left-col col-7">
                                <div class="price">
                                    <del><span>6,890,000<span>تومان</span></span></del>
                                    <ins><span>6,580,000<span>تومان</span></span></ins>
                                    <span class="discount-percent">6 % تخفیف</span>
                                </div>
                                <h2 class="product-title">
                                    <a href="#/"> لپ تاپ ۱۴ اینچی دل مدل vostro 5471 </a>
                                </h2>
                                <ul class="list-group">
                                    <li class="list-group-item">رنگ: نوک مدادی</li>
                                    <li class="list-group-item">120 گیگابایت</li>
                                </ul>
                                <hr>
                                <div class="countdown-timer" countdown="" data-date="05 02 2019 20:20:22">
                                    <span data-days="">0</span>:
                                    <span data-hours="">0</span>:
                                    <span data-minutes="">0</span>:
                                    <span data-seconds="">0</span>
                                </div>
                                <div class="timer-title">زمان باقی مانده تا پایان سفارش</div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row m-0">
                            <div class="right-col col-5 d-flex align-items-center">
                                <a class="w-100 text-center" href="#/">
                                    <img src="assets/img/amazing-slider/35a2b8-200x200.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="left-col col-7">
                                <div class="price">
                                    <del><span>4,799,000<span>تومان</span></span></del>
                                    <ins><span>4,699,000<span>تومان</span></span></ins>
                                    <span class="discount-percent">2 % تخفیف</span>
                                </div>
                                <h2 class="product-title">
                                    <a href="#/"> لپ تاپ ۱۵ اینچی دل مدل Latitude 5580 </a>
                                </h2>
                                <ul class="list-group">
                                    <li class="list-group-item">10 گیگابایت رم</li>
                                    <li class="list-group-item">صفحه نمایش لمسی:خیر</li>
                                </ul>
                                <hr>
                                <div class="countdown-timer" countdown="" data-date="05 02 2019 20:20:22">
                                    <span data-days="">0</span>:
                                    <span data-hours="">0</span>:
                                    <span data-minutes="">0</span>:
                                    <span data-seconds="">0</span>
                                </div>
                                <div class="timer-title">زمان باقی مانده تا پایان سفارش</div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item finished active">
                        <div class="row m-0">
                            <div class="right-col col-5 d-flex align-items-center">
                                <a class="w-100 text-center" href="#/">
                                    <img src="assets/img/amazing-slider/c8297f-200x200.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="left-col col-7">
                                <div class="price">
                                    <del><span>8,999,000<span>تومان</span></span></del>
                                    <ins><span>8,899,000<span>تومان</span></span></ins>
                                    <span class="discount-percent">1 % تخفیف</span>
                                </div>
                                <h2 class="product-title">
                                    <a href="#/"> لپ تاپ ۱۵ اینچی دل مدل INSPIRON 7577 – D </a>
                                </h2>
                                <ul class="list-group">
                                    <li class="list-group-item">160 گیگابایت</li>
                                    <li class="list-group-item">پردازنده: Intel</li>
                                </ul>
                                <hr>
                                <a href="#/" class="finished btn"> تمام شد </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item  finished">
                        <div class="row m-0">
                            <div class="right-col col-5 d-flex align-items-center">
                                <a class="w-100 text-center" href="#/">
                                    <img src="assets/img/amazing-slider/36855a-200x200.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="left-col col-7">
                                <div class="price">
                                    <del><span>3,600,000<span>تومان</span></span></del>
                                    <ins><span>3,490,000<span>تومان</span></span></ins>
                                    <span class="discount-percent">3 % تخفیف</span>
                                </div>
                                <h2 class="product-title">
                                    <a href="#/"> لپ تاپ ۱۵ اینچی لنوو مدل Ideapad 310 – O </a>
                                </h2>
                                <ul class="list-group">
                                    <li class="list-group-item">رنگ: مشکی</li>
                                    <li class="list-group-item">رم: 12 گیگابایت</li>
                                </ul>
                                <hr>
                                <a href="#/" class="finished btn"> تمام شد </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row m-0">
                            <div class="right-col col-5 d-flex align-items-center">
                                <a class="w-100 text-center" href="#/">
                                    <img src="assets/img/amazing-slider/0e6809-200x200.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="left-col col-7">
                                <div class="price">
                                    <del><span>4,160,000;<span>تومان</span></span></del>
                                    <ins><span>4,090,000<span>تومان</span></span></ins>
                                    <span class="discount-percent">2 % تخفیف</span>
                                </div>
                                <h2 class="product-title">
                                    <a href="#/"> لپ تاپ ۱۵ اینچی لنوو مدل Ideapad 520 – F </a>
                                </h2>
                                <ul class="list-group">
                                    <li class="list-group-item">پردازنده: NVIDIA</li>
                                    <li class="list-group-item">حافظه: 160 گیگابایت</li>
                                </ul>
                                <hr>
                                <div class="countdown-timer" countdown="" data-date="05 02 2019 20:20:22">
                                    <span data-days="">0</span>:
                                    <span data-hours="">0</span>:
                                    <span data-minutes="">0</span>:
                                    <span data-seconds="">0</span>
                                </div>
                                <div class="timer-title">زمان باقی مانده تا پایان سفارش</div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item  finished">
                        <div class="row m-0">
                            <div class="right-col col-5 d-flex align-items-center">
                                <a class="w-100 text-center" href="#/">
                                    <img src="assets/img/amazing-slider/2d71f4-200x200.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="left-col col-7">
                                <div class="price">
                                    <del><span>2,390,000<span>تومان</span></span></del>
                                    <ins><span>2,320,000<span>تومان</span></span></ins>
                                    <span class="discount-percent">3 % تخفیف</span>
                                </div>
                                <h2 class="product-title">
                                    <a href="#/"> لپ تاپ ۱۵ اینچی لنوو مدل Ideapad V310 – S </a>
                                </h2>
                                <ul class="list-group">
                                    <li class="list-group-item">صفحه نمایش لمسی: خیر</li>
                                    <li class="list-group-item">پردازنده: Intel</li>
                                </ul>
                                <hr>
                                <a href="#/" class="finished btn"> تمام شد </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row m-0">
                            <div class="right-col col-5 d-flex align-items-center">
                                <a class="w-100 text-center" href="#/">
                                    <img src="assets/img/amazing-slider/59fc05-200x200.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="left-col col-7">
                                <div class="price">
                                    <del><span>5,485,000<span>تومان</span></span></del>
                                    <ins><span>5,380,000<span>تومان</span></span></ins>
                                    <span class="discount-percent">2 % تخفیف</span>
                                </div>
                                <h2 class="product-title">
                                    <a href="#/"> لپ تاپ ۱۵ اینچی ایسوس مدل VivoBook Flip TP510UQ – C
                                    </a>
                                </h2>
                                <ul class="list-group">
                                    <li class="list-group-item">حافظه: 160 گیگابایت</li>
                                    <li class="list-group-item">رنگ: نقره ای</li>
                                </ul>
                                <hr>
                                <div class="countdown-timer" countdown="" data-date="05 02 2019 20:20:22">
                                    <span data-days="">0</span>:
                                    <span data-hours="">0</span>:
                                    <span data-minutes="">0</span>:
                                    <span data-seconds="">0</span>
                                </div>
                                <div class="timer-title">زمان باقی مانده تا پایان سفارش</div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row m-0">
                            <div class="right-col col-5 d-flex align-items-center">
                                <a class="w-100 text-center" href="#/">
                                    <img src="assets/img/amazing-slider/8eb96c-200x200.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="left-col col-7">
                                <div class="price">
                                    <del><span>2,755,000<span>تومان</span></span></del>
                                    <ins><span>2,565,000<span>تومان</span></span></ins>
                                    <span class="discount-percent">8 % تخفیف</span>
                                </div>
                                <h2 class="product-title">
                                    <a href="#/"> لپ تاپ ۱۵ اینچی ایسوس مدل A540UP – F </a>
                                </h2>
                                <ul class="list-group">
                                    <li class="list-group-item">رنگ: خاکستری</li>
                                    <li class="list-group-item">رم: 16 گیگابایت</li>
                                </ul>
                                <hr>
                                <div class="countdown-timer" countdown="" data-date="05 02 2019 20:20:22">
                                    <span data-days="">0</span>:
                                    <span data-hours="">0</span>:
                                    <span data-minutes="">0</span>:
                                    <span data-seconds="">0</span>
                                </div>
                                <div class="timer-title">زمان باقی مانده تا پایان سفارش</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{--      Banner Ad      --}}
        <div class="row banner-ads">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        @foreach($h3 as $banner)
                        <div class="widget widget-banner card">
                            <a href="{{$banner->blink}}">
                                <img class="img-fluid" src="{{$banner->bimage}}" alt="{{$banner->balt}}">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{--    Newest Products    --}}
        <div class="row">
            <div class="col-12">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <h3 class="card-title">
                            <span>جدید ترین محصولات</span>
                        </h3>
                        <a href="#/" class="view-all">مشاهده همه</a>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">







                        <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2411px;"><div class="owl-item active" style="width: 334.313px; margin-left: 10px;"><div class="item">
                                        <a href="#/">
                                            <img src="assets/img/product-slider/60eb20-200x200.jpg" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#/">لپ تاپ ۱۱٫۶ اینچی دل مدل INSPIRON 3168 -AC B</a>
                                        </h2>
                                        <div class="price">
                                            <del><span>4,299,000<span>تومان</span></span></del>
                                            <ins><span>4,180,000<span>تومان</span></span></ins>
                                        </div>
                                    </div></div><div class="owl-item active" style="width: 334.313px; margin-left: 10px;"><div class="item">
                                        <a href="#/">
                                            <img src="assets/img/product-slider/4ff777-200x200.jpg" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#/">لپ تاپ ۱۴ اینچی دل مدل vostro 5471</a>
                                        </h2>
                                        <div class="price">
                                            <del><span>6,890,000<span>تومان</span></span></del>
                                            <ins><span>6,580,000<span>تومان</span></span></ins>
                                        </div>
                                    </div></div><div class="owl-item active" style="width: 334.313px; margin-left: 10px;"><div class="item">
                                        <a href="#/">
                                            <img src="assets/img/product-slider/35a2b8-200x200.jpg" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#/">لپ تاپ ۱۵ اینچی دل مدل Latitude 5580</a>
                                        </h2>
                                        <div class="price">
                                            <del><span>4,799,000<span>تومان</span></span></del>
                                            <ins><span>4,699,000<span>تومان</span></span></ins>
                                        </div>
                                    </div></div><div class="owl-item active" style="width: 334.313px; margin-left: 10px;"><div class="item">
                                        <a href="#/">
                                            <img src="assets/img/product-slider/9b3da9-200x200.jpg" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#/">لپ تاپ ۱۵ اینچی دل مدل INSPIRON 15-3567 - I</a>
                                        </h2>
                                        <div class="price">
                                            <span>2,780,000<span>تومان</span></span>
                                        </div>
                                    </div></div><div class="owl-item" style="width: 334.313px; margin-left: 10px;"><div class="item">
                                        <a href="#/">
                                            <img src="assets/img/product-slider/c8297f-200x200.jpg" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#/">لپ تاپ ۱۵ اینچی دل مدل INSPIRON 7577 - D</a>
                                        </h2>
                                        <div class="price">
                                            <del><span>8,999,000<span>تومان</span></span></del>
                                            <ins><span>8,899,000<span>تومان</span></span></ins>
                                        </div>
                                    </div></div><div class="owl-item" style="width: 334.313px; margin-left: 10px;"><div class="item">
                                        <a href="#/">
                                            <img src="assets/img/product-slider/a579bb-200x200.jpg" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#/">لپ تاپ ۱۵ اینچی دل مدل Inspiron 15-5570 - B</a>
                                        </h2>
                                        <div class="price">
                                            <span>4,279,000<span>تومان</span></span>
                                        </div>
                                    </div></div><div class="owl-item" style="width: 334.313px; margin-left: 10px;"><div class="item">
                                        <a href="#/">
                                            <img src="assets/img/product-slider/19a2cc-200x200.jpg" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#/">لپ تاپ ۱۵ اینچی دل مدل XPS 15-9560</a>
                                        </h2>
                                        <div class="price">
                                            <span>18,450,000<span>تومان</span></span>
                                        </div>
                                    </div></div></div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i class="now-ui-icons arrows-1_minimal-right"></i></button><button type="button" role="presentation" class="owl-next"><i class="now-ui-icons arrows-1_minimal-left"></i></button></div><div class="owl-dots disabled"></div></div>
                </div>
            </div>
        </div>
        {{--    Banner Ad 4    --}}
        <div class="row banner-ads">
            <div class="col-12">
                <div class="row">
                    @foreach($h4 as $banner)
                    <div class="col-6 col-lg-3">
                        <div class="widget-banner card">
                            <a href="{{$banner->blink}}">
                                <img class="img-fluid" src="{{$banner->bimage}}" alt="{{$banner->balt}}">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{--    PorFrosh Products    --}}

        <div class="row">
            <div class="col-12">
                <div class="brand-slider card">
                    <header class="card-header">
                        <h3 class="card-title"><span>محبوب ترن برند ها</span></h3>
                    </header>
                    <div class="owl-carousel">
                        <div class="item">
                            <a href=# />
                            <img src="assets/img/brand/1076.png" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href=# />
                            <img src="assets/img/brand/1078.png" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href=# />
                            <img src="assets/img/brand/1080.png" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href=# />
                            <img src="assets/img/brand/2315.png" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href=# />
                            <img src="assets/img/brand/5189.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
