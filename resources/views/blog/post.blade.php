@extends('layouts.master')
@foreach($Posts as $Post)
    @section('title')
        {{$Post->title}}
    @endsection
    @section('content')
        <link rel="stylesheet" href="/css/singleblog.css">
        <div class="blog-single gray-bg">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col-lg-8 m-15px-tb">
                        <article class="article">
                            <div class="article-img">
                                <img src="{{$Post->thumbnail}}" title="" alt="{{$Post->title}}">
                            </div>
                            <div class="article-title">
                                <h6><a href="#">
                                    {{$Category->name}}
                                    </a></h6>
                                <h2>{{$Post->title}}</h2>
                                <div class="media">
                                    <div class="avatar">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" title="" alt="">
                                    </div>
                                    <div class="media-body">
                                        <label>
                                            @php
                                            $auther = \App\Models\User::all()->find($Post->auther);
                                            @endphp
                                            {{$auther->name}}
                                        </label>
                                        <span>{{jdate($Post->created_at)->format('%A, %d %B %Y')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="article-content" dir="ltr">
                                {{$Post->text}}
                            </div>
                        </article>
{{--                        <div class="contact-form article-comment">--}}
{{--                            <h4>Leave a Reply</h4>--}}
{{--                            <form id="contact-form" method="POST">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input name="Name" id="name" placeholder="Name *" class="form-control" type="text">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input name="Email" id="email" placeholder="Email *" class="form-control" type="email">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <textarea name="message" id="message" placeholder="Your message *" rows="4" class="form-control"></textarea>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="send">--}}
{{--                                            <button class="px-btn theme"><span>Submit</span> <i class="arrow"></i></button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
                    </div>
                    <div class="col-lg-4 m-15px-tb blog-aside">
                        <!-- Trending Post -->
                        <div class="widget widget-post">
                            <div class="widget-title">
                                <h3>محصولات جدید</h3>
                            </div>
                            <div class="widget-body">

                            </div>
                        </div>
                        <!-- End Trending Post -->
                        <!-- Latest Post -->
                        <div class="widget widget-latest-post">
                            <div class="widget-title">
                                <h3>جدید ترین مطالب وبلاگ</h3>
                            </div>
                            <div class="widget-body">
                                @foreach($AllPosts as $Post)
                                <div class="latest-post-aside media">
                                    <div class="lpa-left media-body">
                                        <div class="lpa-title">
                                            <h5><a href="/posts/{{$Post->slug}}">{{$Post->title}}</a></h5>
                                        </div>
                                        <div class="lpa-meta">
                                            <a class="name" href="#">
                                                @php
                                                    $auther = \App\Models\User::all()->find($Post->auther);
                                                @endphp
                                                {{$auther->name}}
                                            </a>
                                            <a class="date" href="#">
                                                {{jdate($Post->created_at)->format('%A, %d %B %Y')}}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="lpa-right mr-6">
                                        <a href="/posts/{{$Post->slug}}">
                                            <img src="{{$Post->thumbnail}}" title="" alt="{{$Post->title}}">
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Latest Post -->
                        <!-- widget Tags -->
                        <div class="widget widget-tags">
                            <div class="widget-title">
                                <h3>دسته بندی های وبلاگ</h3>
                            </div>
                            <div class="widget-body">
                                <div class="nav tag-cloud">
                                    @php
                                        $categorys = \App\Models\BlogCategory::all()->find($Post->category);
                                    @endphp
                                        <a href="/posts/category/{{$categorys->slug}}">{{$categorys->name}}</a>
                                </div>
                            </div>
                        </div>
                        <!-- End widget Tags -->
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endforeach
