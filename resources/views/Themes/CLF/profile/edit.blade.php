@extends('layouts.master')
@section('title')
    ویرایش اطلاعات
@endsection

@section('content')
    <!-- main -->
    <main class="profile-user-page default">
        <div class="container">
            <div class="row">
                <div class="profile-page col-xl-9 col-lg-8 col-md-12 order-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-12">
                                <h1 class="title-tab-content">ویرایش اطلاعات شخصی</h1>
                            </div>
                            <div class="content-section default">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="title-tab-content">حساب شخصی</h1>
                                    </div>
                                </div>
                                @include('CLF.profile.partials.update-profile-information-form')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-page-aside col-xl-3 col-lg-4 col-md-6 center-section order-1">
                    <div class="profile-box">
                        <div class="profile-box-header">
                            <div class="profile-box-avatar">
                                <img src="assets/img/svg/user.svg" alt="">
                            </div>
                            <button data-toggle="modal" data-target="#myModal" class="profile-box-btn-edit">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <!-- Modal Core -->
                            <div class="modal-share modal-width-custom modal fade" id="myModal" tabindex="-1"
                                 role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                &times;
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">تغییر نمایه کاربری شما</h4>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="profile-avatars default text-center">
                                                <li>
                                                    <img class="profile-avatars-item"
                                                         src="assets/img/svg/user.svg"></img>
                                                </li>
                                                <li>
                                                    <img class="profile-avatars-item"
                                                         src="assets/img/svg/avatar-1.svg"></img>
                                                </li>
                                                <li>
                                                    <img class="profile-avatars-item"
                                                         src="assets/img/svg/avatar-2.svg"></img>
                                                </li>
                                                <li>
                                                    <img class="profile-avatars-item"
                                                         src="assets/img/svg/avatar-3.svg"></img>
                                                </li>
                                                <li>
                                                    <img class="profile-avatars-item"
                                                         src="assets/img/svg/avatar-4.svg"></img>
                                                </li>
                                                <li>
                                                    <img class="profile-avatars-item"
                                                         src="assets/img/svg/avatar-5.svg"></img>
                                                </li>
                                                <li>
                                                    <img class="profile-avatars-item"
                                                         src="assets/img/svg/avatar-6.svg"></img>
                                                </li>
                                                <li>
                                                    <img class="profile-avatars-item"
                                                         src="assets/img/svg/avatar-7.svg"></img>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Core -->
                        </div>
                        <div class="profile-box-username">{{Auth::user()->name}}</div>
                        <div class="profile-box-tabs">
                            <a href="{{route('profile.editpass')}}" class="profile-box-tab profile-box-tab-access">
                                <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                تغییر رمز
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{route('logout')}}" class="profile-box-tab profile-box-tab--sign-out" onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                    <i class="now-ui-icons media-1_button-power"></i>
                                    {{ __('خروج از حساب') }}
                                </a>
                            </form>
                        </div>
                    </div>
                    <div class="responsive-profile-menu show-md">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-navicon"></i>
                                حساب کاربری شما
                            </button>
                            <div class="dropdown-menu dropdown-menu-right text-right">
                                <a href="{{route('dashboard')}}" class="dropdown-item ">
                                    <i class="now-ui-icons users_single-02"></i>
                                    پروفایل
                                </a>
                                <a href="profile-orders.html" class="dropdown-item">
                                    <i class="now-ui-icons shopping_basket"></i>
                                    همه سفارش ها
                                </a>
                                <a href="profile-orders-return.html" class="dropdown-item">
                                    <i class="now-ui-icons files_single-copy-04"></i>
                                    درخواست مرجوعی
                                </a>
                                <a href="profile-favorites.html" class="dropdown-item">
                                    <i class="now-ui-icons ui-2_favourite-28"></i>
                                    لیست علاقمندی ها
                                </a>
                                <a href="#" class="dropdown-item active-menu">
                                    <i class="now-ui-icons business_badge "></i>
                                    اطلاعات شخصی
                                </a>
                                @if(auth()->user()->isAdmin)
                                    <a href="{{route('admin')}}" class="dropdown-item active-menu fw-bold">
                                        پنل ادمین
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="profile-menu hidden-md">
                        <div class="profile-menu-header">حساب کاربری شما</div>
                        <ul class="profile-menu-items">
                            <li>
                                <a href="{{route('dashboard')}}" class="active">
                                    <i class="now-ui-icons users_single-02"></i>
                                    پروفایل
                                </a>
                            </li>
                            <li>
                                <a href="profile-orders.html">
                                    <i class="now-ui-icons shopping_basket"></i>
                                    همه سفارش ها
                                </a>
                            </li>
                            <li>
                                <a href="profile-orders-return.html">
                                    <i class="now-ui-icons files_single-copy-04"></i>
                                    درخواست مرجوعی
                                </a>
                            </li>
                            <li>
                                <a href="profile-favorites.html">
                                    <i class="now-ui-icons ui-2_favourite-28"></i>
                                    لیست علاقمندی ها
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="now-ui-icons business_badge"></i>
                                    اطلاعات شخصی
                                </a>
                            </li>
                            <li>
                                @if(auth()->user()->isAdmin)
                                    <a href="{{route('admin')}}" class="dropdown-item active-menu fw-bold">
                                        پنل ادمین
                                    </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- main -->
@endsection
