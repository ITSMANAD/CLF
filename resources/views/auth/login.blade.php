@extends('layouts.master')
@foreach ($Settings['setting'] as $setting)
    @section('title')
        {{ $setting['sname'] }}
    @endsection
    @section('content')
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="main-content col-12 col-md-7 col-lg-5 mx-auto">
                        <div class="account-box">
                            <a href="#" class="logo">
                                <img src="{{ $setting['slogo'] }}" alt="">
                            </a>
                            <div class="account-box-title text-right">ورود به {{ $setting['sname'] }}</div>
                            <div class="account-box-content">
                                <form class="form-account">
                                    <div class="form-account-title">ایمیل </div>
                                    <div class="form-account-row">
                                        <label class="input-label"><i class="now-ui-icons users_single-02"></i></label>
                                        <input name="email" class="input-field" type="text"
                                               placeholder="ایمیل خود را وارد نمایید">
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                            {{ __('رمز عبور خود را فرموش کرده اید؟') }}
                                        </a>
                                    @endif
                                    <div class="form-account-row">
                                        <label class="input-label"><i
                                                class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                        <input name="password" class="input-field" type="password"
                                               placeholder="رمز عبور خود را وارد نمایید">
                                    </div>
                                    <div class="form-account-row form-account-submit">
                                        <div class="parent-btn">
                                            <button type="submit" class="dk-btn dk-btn-info">
                                                ورود به {{ $setting['sname'] }}
                                                <i class="fa fa-sign-in"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block mt-4">
                                        <div class="form-account-agree">
                                            <label class="checkbox-form checkbox-primary">
                                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                                <span class="checkbox-check"></span>
                                            </label>
                                            <label for="agree">مرا به خاطر داشته باش</label>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="account-box-footer">
                                <span>کاربر جدید هستید؟</span>
                                <a href="{{route('register')}}" class="btn-link-border">ثبت‌نام در
                                    {{ $setting['sname'] }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endsection
