@extends('layouts.master')

@section('title')
    دسته بندی  {{$Category->name}}
@endsection

@section('content')
    <link rel="stylesheet" href="/css/blog.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <section class="blog-listing gray-bg">
        <div class="container">
            <h2 class="fs-4 fw-bold">نوشته هایی با دسته بندی {{$Category->name}}</h2>
            <div class="row align-items-start">

                <div class="col-lg-8 m-15px-tb" >
                    <div class="row">
                        @foreach($Posts as $Post)
                            <div class="col-sm-6">
                                <div class="blog-grid">
                                    <div class="blog-img">
                                        <div class="date">
                                            <span>{{jdate($Post->created_at)->format('%d')}}</span>
                                            <label class="fw-bold fs-5">{{jdate($Post->created_at)->format('%B')}}</label>
                                        </div>
                                        <a href="/posts/{{$Post->slug}}">
                                            <img src="{{$Post->thumbnail}}" alt="{{$Post->title}}">
                                        </a>
                                    </div>
                                    <div class="blog-info">
                                        <h5><a href="{{$Post->slug}}">{{$Post->title}}</a></h5>
                                        <p class="text-break">{{$Post->description}}</p>
                                        <div class="btn-bar">
                                            <a href="/posts/{{$Post->slug}}" class="px-btn-arrow">
                                                <span class="fw-bold btn btn-info float-start">ادامه مطلب</span>
                                                <i class="arrow"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            </ul>
                        </div>
                    </div>
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
                                    $categorys = \App\Models\BlogCategory::all();
                                @endphp
                                @foreach($categorys as $category)
                                    <a href="/posts/category/{{$category->slug}}">{{$category->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- End widget Tags -->
                </div>
            </div>
        </div>
    </section>
@endsection

