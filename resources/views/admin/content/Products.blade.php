@extends('admin.partials.master')
@section('title','محصولات فروشگاه')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">محصولات فروشگاه</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item active">فروشگاه</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <!-- head -->
                            <thead>
                            <tr>
                                <th>
                                    <label>
                                        <input type="checkbox" class="checkbox" />
                                    </label>
                                </th>
                                <th>نام</th>
                                <th>قیمت</th>
                                <th>وضعیت</th>
                                <th>تاریخ ایجاد</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- rows -->
                            @foreach($Products as $Product)
                                @php
                                $Product_Price = \App\Models\Products_Price::all()->whereIn('PID',$Product->id)->first();
                                $Product_Gallery = \App\Models\Products_Gallery::all()->whereIn('PID',$Product->id)->first();
                                @endphp
                            <tr>
                                <th>
                                    <label>
                                        <input type="checkbox" class="checkbox" />
                                    </label>
                                </th>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="avatar">
                                            <div class="mask mask-squircle w-12 h-12">
                                                <img src="{{$Product_Gallery->image}}" alt="{{$Product_Gallery->alt}}" />
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold">{{$Product->name}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                @if($Product_Price->in_amazing == 1)
                                        <p class="fw-bold">{{number_format($Product_Price->amazing_price)}} تومان</p>
                                        <span class="badge badge-ghost badge-sm text-decoration-line-through">{{number_format($Product_Price->price)}} تومان</span>
                                @endif
                                </td>
                                <td>
                                    @if($Product->status == 1)
                                        <span class="badge badge-success text-white">فعال</span>
                                    @else
                                        <span class="badge badge-danger text-white">غیرفعال</span>
                                    @endif
                                </td>
                                <td>
                                    {{jdate($Product->created_at)->format('%A, %d %B %Y')}}
                                </td>
                                <th>
                                    <a href="products/{{$Product->id}}" class="btn btn-ghost btn-xs ">مشاهده جزییات</a>
                                    <button class="btn btn-warning btn-xs">ویرایش</button>
                                </th>
                            </tr>
                            @endforeach
                            </tbody>
                            <!-- foot -->
                            <tfoot>
                            <tr>
                                <th></th>
                                <th>نام</th>
                                <th>قیمت</th>
                                <th>وضعیت</th>
                                <th>تاریخ ایجاد</th>
                                <th></th>
                            </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
