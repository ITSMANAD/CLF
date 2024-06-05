@extends('Themes.CLF.layouts.master')
@foreach ($Settings['setting'] as $setting)
    @section('title')
        {{ $setting['sname'] }}
    @endsection
    @section('content')
<div class="container">
    <div class="row">
        <div class="main-content col-12 col-md-7 col-lg-5 mx-auto">
            <div class="account-box">
                <a href="#" class="logo">
                    <img src="{{$setting->slogo}}" alt="">
                </a>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(count(\App\Models\User::all()) > 0)
                @else
                    <div class="alert alert-warning fw-bold fs-6">
                        اولین یوزر به حالت ادمین فعال میشود!
                    </div>
                @endif
                <div class="account-box-title">ثبت‌نام در {{ $setting['sname'] }} </div>
                <div class="account-box-content">
                    <form method="POST" action="{{ route('register') }}" class="text-end">
                        @csrf
                        <div class="form-account-title">پست الکترونیک </div>
                        <div class="form-account-row">
                            <label class="input-label"><i class="now-ui-icons users_single-02"></i></label>
                            <input class="input-field" name="email" type="email"
                                   placeholder="پست الکترونیک خود را وارد نمایید">
                        </div>
                        <div class="form-account-title">نام و نام خانوادگی</div>
                        <div class="form-account-row">
                            <label class="input-label"><i class="now-ui-icons users_single-02"></i></label>
                            <input class="input-field text-start" name="name" type="text"
                                   placeholder="نام و نام خانوادگی خود را وارد نمایید">
                        </div>
                        <div class="form-account-title">آدرس دقیق</div>
                        <div class="form-account-row">
                            <label class="input-label"><i class="now-ui-icons users_single-02"></i></label>
                            <input class="input-field text-start" name="address" type="text"
                                   placeholder="آدرس محل سکونت خود را وارد نمایید">
                        </div>
                        <div class="form-account-title">کدپستی</div>
                        <div class="form-account-row">
                            <label class="input-label"><i class="now-ui-icons users_single-02"></i></label>
                            <input class="input-field text-start" name="postalcode" type="text"
                                   placeholder="کد پستی خود را وارد نمایید">
                        </div>
                        <div class="form-account-title">شماره همراه</div>
                        <div class="form-account-row">
                            <label class="input-label"><i class="now-ui-icons users_single-02"></i></label>
                            <input class="input-field text-start" name="phone" type="tel"
                                   placeholder="شماره همراه خود را وارد نمایید">
                        </div>
                        <div class="form-account-title">کلمه عبور</div>
                        <div class="form-account-row">
                            <label class="input-label"><i
                                    class="now-ui-icons ui-1_lock-circle-open"></i></label>
                            <input name="password" class="input-field" type="password"
                                   placeholder="کلمه عبور خود را وارد نمایید">
                        </div>
                        <div class="form-account-agree">
                            <label class="checkbox-form checkbox-primary">
                                <input type="checkbox" checked="checked">
                                <span class="checkbox-check"></span>
                            </label>
                            <label for="agree">
                                <a href="#" class="btn-link-border">حریم خصوصی</a> و <a href="#"
                                                                                        class="btn-link-border">شرایط و قوانین</a> استفاده از سرویس های سایت
                                {{ $setting['sname'] }} را مطالعه نموده و با کلیه موارد آن موافقم.</label>
                        </div>
                        <div class="form-account-row form-account-submit">
                            <div class="parent-btn">
                                <button class="dk-btn dk-btn-info">
                                    ثبت نام در {{ $setting['sname'] }}
                                    <i class="now-ui-icons users_circle-08"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="account-box-footer">
                    <span>قبلا در {{ $setting['sname'] }} ثبت‌نام کرده‌اید؟</span>
                    <a href="{{route('login')}}" class="btn-link-border">وارد شوید</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
    @endsection
