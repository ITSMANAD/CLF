<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/css/now-ui-kit.css" rel="stylesheet" />
    <link href="/assets/css/plugins/owl.carousel.css" rel="stylesheet" />
    <link href="/assets/css/plugins/owl.theme.default.min.css" rel="stylesheet" />
    <link href="/assets/css/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/fonts/font-awesome/css/font-awesome.min.css" />
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>
<body class="antialiased">
@foreach ($Settings['setting'] as $setting)


    <!-- responsive-header -->
    <nav class="navbar direction-ltr fixed-top header-responsive">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="/">
                    <img src="{{$setting->logo}}" class="header-responsive w-25"  alt="">
                </a>
                <button class="navbar-toggler navbar-toggler-icon text-center fs-5" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">

                </button>
                <div class="search-nav default w-75">
                    <form action="">
                        <input type="text" placeholder="جستجو ...">
                        <button type="submit"><img src="/assets/img/search.png" alt=""></button>
                    </form>
                    <ul>
                        <li><a href="{{route('dashboard')}}"><i class="now-ui-icons users_single-02"></i></a></li>
                        <li>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <button type="button"  class="btn-link js-modal-trigger"  data-target="cart">
                            <i class="now-ui-icons shopping_basket"></i>
                        </button>

                        </li>
                    </ul>
                </div>
            </div>

            <div class="collapse navbar-collapse mt-5 justify-content-end" id="navigation">
                <ul class="navbar-nav default">
                    <li class="sub-menu">
                        <a href=# />کالای دیجیتال</a>
                        <ul>
                            <li class="sub-menu">
                                <a href=# />لوازم جانبی گوشی</a>
                                <ul>
                                    <li>
                                        <a href="#/">کیف و کاور گوشی</a>
                                    </li>
                                    <li>
                                        <a href="#/">پاور بانک</a>
                                    </li>
                                    <li>
                                        <a href="#/">هندزفری،هدفون</a>
                                    </li>
                                    <li>
                                        <a href="#/">پایه نگهدارنده گوشی</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href=# />گوشی موبایل</a>
                                <ul>
                                    <li>
                                        <a href=# /></a>
                                    </li>
                                    <li>
                                        <a href=# />آیفون اپل</a>
                                    </li>
                                    <li>
                                        <a href=# />هوآوی</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href=# />ساعت هوشمند</a>
                            </li>
                            <li>
                                <a href=# />اسپیکر بلوتوث و با سیم</a>
                            </li>
                            <li class="sub-menu">
                                <a href=# />موبایل</a>
                                <ul>
                                    <li>
                                        <a href=# />Apple</a>
                                    </li>
                                    <li>
                                        <a href=# />Asus</a>
                                    </li>
                                    <li>
                                        <a href=# />HTC</a>
                                    </li>
                                    <li>
                                        <a href=# />LG</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href=# />آرایشی،بهداشت</a>
                        <ul>
                            <li class="sub-menu">
                                <a href=# />لوازم جانبی گوشی</a>
                                <ul>
                                    <li>
                                        <a href=# />کیف و کاور گوشی</a>
                                    </li>
                                    <li>
                                        <a href=# />پاور بانک</a>
                                    </li>
                                    <li>
                                        <a href=# />هندزفری،هدفون</a>
                                    </li>
                                    <li>
                                        <a href=# />پایه نگهدارنده گوشی</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href=# />گوشی موبایل</a>
                                <ul>
                                    <li>
                                        <a href=# /></a>
                                    </li>
                                    <li>
                                        <a href=# />آیفون اپل</a>
                                    </li>
                                    <li>
                                        <a href=# />هوآوی</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href=# />ساعت هوشمند</a>
                            </li>
                            <li>
                                <a href=# />اسپیکر بلوتوث و با سیم</a>
                            </li>
                            <li class="sub-menu">
                                <a href=# />موبایل</a>
                                <ul>
                                    <li>
                                        <a href=# />Apple</a>
                                    </li>
                                    <li>
                                        <a href=# />Asus</a>
                                    </li>
                                    <li>
                                        <a href=# />HTC</a>
                                    </li>
                                    <li>
                                        <a href=# />LG</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href=# />خودرو،ابزار و اداری</a>
                        <ul>
                            <li class="sub-menu">
                                <a href=# />لوازم جانبی گوشی</a>
                                <ul>
                                    <li>
                                        <a href="#/">کیف و کاور گوشی</a>
                                    </li>
                                    <li>
                                        <a href="#/">پاور بانک</a>
                                    </li>
                                    <li>
                                        <a href="#/">هندزفری،هدفون</a>
                                    </li>
                                    <li>
                                        <a href="#/">پایه نگهدارنده گوشی</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href=# />گوشی موبایل</a>
                                <ul>
                                    <li>
                                        <a href=# /></a>
                                    </li>
                                    <li>
                                        <a href=# />آیفون اپل</a>
                                    </li>
                                    <li>
                                        <a href=# />هوآوی</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href=# />ساعت هوشمند</a>
                            </li>
                            <li>
                                <a href=# />اسپیکر بلوتوث و با سیم</a>
                            </li>
                            <li class="sub-menu">
                                <a href=# />موبایل</a>
                                <ul>
                                    <li>
                                        <a href=# />Apple</a>
                                    </li>
                                    <li>
                                        <a href=# />Asus</a>
                                    </li>
                                    <li>
                                        <a href=# />HTC</a>
                                    </li>
                                    <li>
                                        <a href=# />LG</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href=# />مد و پوشاک</a>
                    </li>
                    <li>
                        <a href=# />خانه و آشپزخانه</a>
                    </li>
                    <li>
                        <a href=# />کتاب،لوازم تحریر</a>
                    </li>
                    <li>
                        <a href=# />ورزش و سفر</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Header -->
    <header class="main-header default">
        <div class="container is-max-desktop">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                    <div class="logo-area default">
                        <a href="/">
                        <img src="{{ $setting['slogo'] }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 col-sm-8 col-7">
                    <div class="search-area default">
                        <form action="" class="search">
                            <input type="text" placeholder="نام کالا، برند و یا دسته مورد نظر خود را جستجو کنید…">
                            <button type="submit"><img src="/assets/img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    @auth
                    <div class="user-login dropdown">
                        <a href="" class="btn btn-light text-light dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink1">
                            <i class="fa fa-user-circle-o fs-5"></i>
                            {{auth()->user()->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                            <div class="dropdown-item">

                            <div class="d-grid gap-2">

                                <a href="{{route('dashboard')}}">
                                    <i class="fa fa-tachometer fs-5"></i>
                                    پروفایل کاربر</a>
                            </div>


                        </div>
                            <div class="dropdown-item">

                                <div class="d-grid gap-2">
                                    <form method="post" action="{{route('logout')}}">
                                        @method('patch')
                                    <button class="btn btn-link fs-6 text-decoration-none">
                                        <i class="fa fa-sign-out fs-5"></i>
                                        خروج از حساب</button>
                                    </form>
                                </div>
                            </div>
                        </ul>
                    </div>


                    @else
                    <div class="user-login dropdown">
                        <a href="#/" class="btn btn-neutral dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink1">
                            ورود / ثبت نام
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                            <div class="dropdown-item">
                                <x-nav-link :href="route('dashboard')" class="btn btn-info">ورود به حساب</x-nav-link>
                            </div>
                            <div class="dropdown-item font-weight-bold">
                                <span>کاربر جدید هستید؟</span> <a class="register" href="{{route('register')}}"/>ثبت‌نام</a>
                            </div>
                        </ul>
                    </div>
                    @endauth

                        <button data-target="cart"  class="btn js-modal-trigger fw-bold shadow" style="border-radius: 10px;font-size: 12px;background-color: #FF4961;">
                            سبد خرید
                        </button>

                        <div id="cart" class="modal">
                            <div class="modal-background"></div>
                            <div class="modal-content" style="width: 60%">
                                <div class="card card-light">
                                    <div class="card-header">
                                        <div class="card-title fw-bold fs-4">سبد خرید</div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table text-end">
                                            <thead>
                                            <tr >
                                                <th></th>
                                                <th class="text-end">تصویر</th>
                                                <th class="text-end">نام</th>
                                                <th class="text-end">قیمت</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(auth()->check())
                                                @php
                                                $Carts = \App\Models\Cart::all()->whereIn('UID',auth()->user()->id);
                                                @endphp
                                                @foreach($Carts as $Cart)
                                                    @php
                                                        $Product = \App\Models\Products::all()->whereIn('id',$Cart->PID)->first();
                                                        $Product_Price = \App\Models\Products_Price::all()->whereIn('id',$Product->id)->first();
                                                        $Product_Image = \App\Models\Products_Gallery::all()->whereIn('PID',$Cart->PID)->first();
                                                    @endphp
                                            <tr>
                                                <th>
                                                    <a href="/cart/remove/{{$Cart->id}}" class="button"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                </th>
                                                <td class="w-25"><img class="img-fluid img-thumbnail w-50" src="{{$Product_Image->image}}" alt=""></td>
                                                <td>{{$Product->name}}</td>
                                                <td>{{number_format($Product_Price->price)}} تومان</td>
                                            </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <th>برای نمایش سبد خرید ابتدا وارد حساب خود شوید!</th>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="card-footer ">
                                        <p class=" fs-5 m-1">پرداخت :</p><br>
                                        @if(auth()->check())
                                        @php

                                        $Cart1 = \App\Models\Cart::all()->whereIn('UID',auth()->user()->id);
                                        $totalprice = 0;
                                        foreach ($Cart1 as $item){
                                        $price = \App\Models\Products_Price::all()->whereIn('PID',$item->PID)->first();
                                        $totalprice += $price->price ;
                                        }
                                        @endphp

                                        <div class="fw-bold fs-5" style="display: flex">  جمع قیمت : <p>{{number_format($totalprice)}} تومان</p> </div>
                                        @endif
                                        <br>
                                    </div>
                                    <div class="container m-2" >
                                        <button class="btn fw-bold" style="border-radius: 15px;font-size: 12px;background-color: #FF4961;">
                                            ادامه مراحل پرداخت
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <button class="modal-close is-large" aria-label="close"></button>
                        </div>
                </div>
            </div>
        </div>
        <nav class="main-menu">
            <div class="container is-max-desktop">
                <ul class="list float-right">
                    <li class="list-item list-item-has-children mega-menu mega-menu-col-5">
                        <a class="nav-link" href=# />کالای دیجیتال</a>
                        <ul class="sub-menu nav">
                            <li class="list-item list-item-has-children">
                                <i class="now-ui-icons arrows-1_minimal-left"></i><a class="main-list-item nav-link" href=# />لوازم
                                جانبی گوشی</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="#/">کیف و کاور گوشی</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />پاور بانک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />هندزفری،هدفون</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />پایه نگهدارنده گوشی</a>
                                    </li>
                                    <li class="list-item list-item-has-children">
                                        <i class="now-ui-icons arrows-1_minimal-left"></i><a class="main-list-item nav-link" href=# />گوشی موبایل</a>
                                        <ul class="sub-menu nav">
                                            <li class="list-item">
                                                <a class="nav-link" href=# />آیفون اپل</a>
                                            </li>
                                            <li class="list-item">
                                                <a class="nav-link" href=# />هوآوی</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="list-item">
                                        <i class="now-ui-icons arrows-1_minimal-left"></i><a class="main-list-item nav-link" href=# />ساعت هوشمند</a>
                                    </li>
                                    <li class="list-item">
                                        <i class="now-ui-icons arrows-1_minimal-left"></i><a class="main-list-item nav-link" href=# />اسپیکر بلوتوث و با سیم</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <i class="now-ui-icons arrows-1_minimal-left"></i><a class="main-list-item nav-link" href=# />موبایل</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Apple</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />ASUS</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />HTC</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />LG</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Nokia</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Samsung</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Sony</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <i class="now-ui-icons arrows-1_minimal-left"></i><a class="nav-link" href=# />تبلت
                                و کتابخوان</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Acer</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Amazon</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Apple</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />ASUS</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />HTC</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Samsung</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <i class="now-ui-icons arrows-1_minimal-left"></i><a class="nav-link" href=# />دوربین</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Canon</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Casio</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Nikon</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Sony</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <i class="now-ui-icons arrows-1_minimal-left"></i><a class="nav-link" href=# />کامپیوتر و تجهیزات
                                جانبی</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href=# />هارد دیسک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />نمایشگر</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />مادر بورد</a></li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />پردازنده</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />کارت گرافیک</a>
                                    </li>
                                </ul>
                            </li>
                            <img src="/assets/img/1636.png" alt="">
                        </ul>
                    </li>
                    <li class="list-item list-item-has-children mega-menu mega-menu-col-5">
                        <a class="nav-link" href=# />آرایشی،بهداشت و سلامت</a>
                        <ul class="sub-menu nav">
                            <li class="list-item list-item-has-children">
                                <i class="now-ui-icons arrows-1_minimal-left"></i><a class="main-list-item nav-link" href=# />لوازم
                                جانبی گوشی</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href=# />کیف و کاور گوشی</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />پاور بانک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />هندزفری،هدفون</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />پایه نگهدارنده گوشی</a>
                                    </li>
                                    <li class="list-item list-item-has-children">
                                        <i class="now-ui-icons arrows-1_minimal-left"></i><a class="main-list-item nav-link" href=# />گوشی
                                        موبایل</a>
                                        <ul class="sub-menu nav">
                                            <li class="list-item">
                                                <a class="nav-link" href=# />آیفون اپل</a>
                                            </li>
                                            <li class="list-item">
                                                <a class="nav-link" href=# />هوآوی</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="list-item">
                                        <i class="now-ui-icons arrows-1_minimal-left"></i><a class="main-list-item nav-link" href=# />ساعت
                                        هوشمند</a>
                                    </li>
                                    <li class="list-item">
                                        <i class="now-ui-icons arrows-1_minimal-left"></i><a class="main-list-item nav-link" href=# />اسپیکر
                                        بلوتوث و با سیم</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <i class="now-ui-icons arrows-1_minimal-left"></i><a class="main-list-item nav-link" href=# />موبایل</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Apple</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />ASUS</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />HTC</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />LG</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Nokia</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Samsung</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Sony</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <i class="now-ui-icons arrows-1_minimal-left"></i><a class="nav-link" href=# />تبلت
                                و کتابخوان</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Acer</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Amazon</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Apple</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />ASUS</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />HTC</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Samsung</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <i class="now-ui-icons arrows-1_minimal-left"></i><a class="nav-link" href=# />دوربین</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Canon</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Casio</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Nikon</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Sony</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <i class="now-ui-icons arrows-1_minimal-left"></i><a class="nav-link" href=# />کامپیوتر و تجهیزات
                                جانبی</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href=# />هارد دیسک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />نمایشگر</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />مادر بورد</a></li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />پردازنده</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />کارت گرافیک</a>
                                    </li>
                                </ul>
                            </li>
                            <img src="/assets/img/1636.png" alt="">
                        </ul>
                    </li>
                    <li class="list-item list-item-has-children mega-menu mega-menu-col-5">
                        <a class="nav-link" href="">خودرو،ابزار و اداری</a>
                        <ul class="sub-menu nav">
                            <li class="list-item list-item-has-children">
                                <i class="now-ui-icons arrows-1_minimal-left"></i><a class="main-list-item nav-link" href=# />لوازم
                                جانبی گوشی</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href=# />کیف و کاور گوشی</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />پاور بانک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />هندزفری،هدفون</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />پایه نگهدارنده گوشی</a>
                                    </li>
                                    <li class="list-item list-item-has-children">
                                        <i class="now-ui-icons arrows-1_minimal-left"></i><a class="main-list-item nav-link" href=# />گوشی
                                        موبایل</a>
                                        <ul class="sub-menu nav">
                                            <li class="list-item">
                                                <a class="nav-link" href=# />آیفون اپل</a>
                                            </li>
                                            <li class="list-item">
                                                <a class="nav-link" href=# />هوآوی</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="list-item">
                                        <i class="now-ui-icons arrows-1_minimal-left"></i><a class="main-list-item nav-link" href=# />ساعت
                                        هوشمند</a>
                                    </li>
                                    <li class="list-item">
                                        <i class="now-ui-icons arrows-1_minimal-left"></i><a class="main-list-item nav-link" href=# />اسپیکر
                                        بلوتوث و با سیم</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <i class="now-ui-icons arrows-1_minimal-left"></i><a class="main-list-item nav-link" href=# />موبایل</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Apple</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />ASUS</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />HTC</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />LG</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Nokia</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Samsung</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Sony</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <i class="now-ui-icons arrows-1_minimal-left"></i><a class="nav-link" href=# />تبلت
                                و کتابخوان</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Acer</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Amazon</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Apple</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />ASUS</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />HTC</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Samsung</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <i class="now-ui-icons arrows-1_minimal-left"></i><a class="nav-link" href=# />دوربین</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Canon</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Casio</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Nikon</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />Sony</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <i class="now-ui-icons arrows-1_minimal-left"></i><a class="nav-link" href=# />کامپیوتر و تجهیزات
                                جانبی</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href=# />هارد دیسک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />نمایشگر</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />مادر بورد</a></li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />پردازنده</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href=# />کارت گرافیک</a>
                                    </li>
                                </ul>
                            </li>
                            <img src="/assets/img/1636.png" alt="">
                        </ul>
                    </li>
                    <li class="list-item">
                        <a class="nav-link" href=# />مد و پوشاک</a>
                    </li>
                    <li class="list-item">
                        <a class="nav-link" href=# />خانه و آشپزخانه</a>
                    </li>
                    <li class="list-item">
                        <a class="nav-link" href=# />کتاب،لوازم تحریر</a>
                    </li>
                    <li class="list-item">
                        <a class="nav-link" href=# />ورزش و سفر</a>
                    </li>
                    <li class="list-item">
                        <a class="nav-link" href=# />وسایل نقلیه و صنعتی</a>
                    </li>
                    <li class="list-item amazing-item">
                        <a class="nav-link" href=#/ target="_blank">شگفت‌انگیزها</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    @endforeach

    <!-- responsive-header -->
    @yield('content')

    <footer class="main-footer default">
        <div class="back-to-top">
            <a href=# /><span class="icon"><i class="now-ui-icons arrows-1_minimal-up"></i></span> <span>بازگشت به
                بالا</span></a>
        </div>
        <div class="container">
            <div class="footer-services">
                <div class="row">
                    <div class="service-item col">
                        <a href=#/ target="_blank">
                            <img src="/assets/img/svg/delivery.svg">
                        </a>
                        <p>تحویل اکسپرس</p>
                    </div>
                    <div class="service-item col">
                        <a href=#/ target="_blank">
                            <img src="/assets/img/svg/contact-us.svg">
                        </a>
                        <p>پشتیبانی 24 ساعته</p>
                    </div>
                    <div class="service-item col">
                        <a href=#/ target="_blank">
                            <img src="/assets/img/svg/payment-terms.svg">
                        </a>
                        <p>پرداخت درمحل</p>
                    </div>
                    <div class="service-item col">
                        <a href=#/ target="_blank">
                            <img src="/assets/img/svg/return-policy.svg">
                        </a>
                        <p>۷ روز ضمانت بازگشت</p>
                    </div>
                    <div class="service-item col">
                        <a href=#/ target="_blank">
                            <img src="/assets/img/svg/origin-guarantee.svg">
                        </a>
                        <p>ضمانت اصل بودن کالا</p>
                    </div>
                </div>
            </div>
            <div class="footer-widgets">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="widget-menu widget card">
                            <header class="card-header">
                                <h3 class="card-title">راهنمای خرید از دیجی کالا</h3>
                            </header>
                            <ul class="footer-menu">
                                <li>
                                    <a href=# />نحوه ثبت سفارش</a>
                                </li>
                                <li>
                                    <a href=# />رویه ارسال سفارش</a>
                                </li>
                                <li>
                                    <a href=# />شیوه‌های پرداخت</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="widget-menu widget card">
                            <header class="card-header">
                                <h3 class="card-title">خدمات مشتریان</h3>
                            </header>
                            <ul class="footer-menu">
                                <li>
                                    <a href=# />پاسخ به پرسش‌های متداول</a>
                                </li>
                                <li>
                                    <a href=# />رویه‌های بازگرداندن کالا</a>
                                </li>
                                <li>
                                    <a href=# />شرایط استفاده</a>
                                </li>
                                <li>
                                    <a href=# />حریم خصوصی</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="widget-menu widget card">
                            <header class="card-header">
                                <h3 class="card-title">با دیجی کالا</h3>
                            </header>
                            <ul class="footer-menu">
                                <li>
                                    <a href=# />فروش در دیجی کالا</a>
                                </li>
                                <li>
                                    <a href=# />همکاری با سازمان‌ها</a>
                                </li>
                                <li>
                                    <a href=# />فرصت‌های شغلی</a>
                                </li>
                                <li>
                                    <a href=# />تماس با دیجی کالا</a>
                                </li>
                                <li>
                                    <a href=# />درباره دیجی کالا</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="newsletter">
                            <p>از تخفیف‌ها و جدیدترین‌های فروشگاه باخبر شوید:</p>
                            <form action="">
                                <input type="email" class="form-control" placeholder="آدرس ایمیل خود را وارد کنید...">
                                <input type="submit" class="btn btn-primary" value="ارسال">
                            </form>
                        </div>
                        <div class="socials">
                            <p>ما را در شبکه های اجتماعی دنبال کنید.</p>
                            <div class="footer-social">
                                <a href=#/ target="_blank"><i class="fa fa-instagram"></i>اینستاگرام دیجی کالا</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <span>هفت روز هفته ، 24 ساعت شبانه‌روز پاسخگوی شما هستیم.</span>
                    </div>
                    <div class="col-12 col-lg-2">شماره تماس: 021-123456789</div>
                    <div class="col-12 col-lg-2">آدرس ایمیل:<a href=# />info@digikala.com</a></div>
                    <div class="col-12 col-lg-4 text-center">
                        <a href=#/ target="_blank"><img src="/assets/img/bazzar.png" width="159" height="48" alt=""></a>
                        <a href=#/ target="_blank"><img src="/assets/img/sibapp.png" width="159" height="48" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="description">
            <div class="container">
                <div class="row">
                    <div class="site-description col-12 col-lg-7">
                        <h1 class="site-title">فروشگاه اینترنتی دیجی کالا، بررسی، انتخاب و خرید آنلاین</h1>
                        <p>
                            دیجی کالا به عنوان یکی از قدیمی‌ترین فروشگاه های اینترنتی با بیش از یک دهه تجربه، با
                            پایبندی به سه اصل کلیدی، پرداخت در
                            محل، 7 روز ضمانت بازگشت کالا و تضمین اصل‌بودن کالا، موفق شده تا همگام با فروشگاه‌های
                            معتبر جهان، به بزرگ‌ترین فروشگاه
                            اینترنتی ایران تبدیل شود. به محض ورود به دیجی کالا با یک سایت پر از کالا رو به رو
                            می‌شوید! هر آنچه که نیاز دارید و به
                            ذهن شما خطور می‌کند در اینجا پیدا خواهید کرد.
                        </p>
                    </div>
                    <div class="symbol col-12 col-lg-5">
                        <a href=#/ target="_blank"><img src="/assets/img/symbol-01.png" alt=""></a>
                        <a href=#/ target="_blank"><img src="/assets/img/symbol-02.png" alt=""></a>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <ul class="footer-partners default">
                                <li class="col-md-3 col-sm-6">
                                    <a href=""><img src="/assets/img/footer/1.svg" alt=""></a>
                                </li>
                                <li class="col-md-3 col-sm-6">
                                    <a href=""><img src="/assets/img/footer/2.svg" alt=""></a>
                                </li>
                                <li class="col-md-3 col-sm-6">
                                    <a href=""><img src="/assets/img/footer/3.svg" alt=""></a>
                                </li>
                                <li class="col-md-3 col-sm-6">
                                    <a href=""><img src="/assets/img/footer/4.svg" alt=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <p>
                    استفاده از مطالب فروشگاه اینترنتی دیجی کالا فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است.
                    کلیه حقوق این سایت متعلق
                    به شرکت نوآوران فن آوازه (فروشگاه آنلاین دیجی کالا) می‌باشد.
                </p>
            </div>
        </div>
    </footer>

    <!-- Some Scripts -->
    <script src="/assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="/assets/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
    <script src="/assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Share Library etc -->
    <script src="/assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
    <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
    <script src="/assets/js/now-ui-kit.js" type="text/javascript"></script>
    <!--  CountDown -->
    <script src="/assets/js/plugins/countdown.min.js" type="text/javascript"></script>
    <!--  Plugin for Sliders -->
    <script src="/assets/js/plugins/owl.carousel.min.js" type="text/javascript"></script>
    <!--  Jquery easing -->
    <script src="/assets/js/plugins/jquery.easing.1.3.min.js" type="text/javascript"></script>
<!--  Plugin ez-plus -->
<script src="assets/js/plugins/jquery.ez-plus.js" type="text/javascript"></script>
    <!-- Main Js -->
    <script src="/assets/js/main.js" type="text/javascript"></script>
</body>
</html>
