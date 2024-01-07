@extends('admin.partials.master')
@section('title','ادمین - تنظیمات صفحه اصلی')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ویرایش صفحه اول</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}">داشبورد</a></li>
                            <li class="breadcrumb-item active">تنظیمات</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="alert alert-info alert-dismissible">
                    <h5><i class="icon fa fa-info"></i> توجه!</h5>
                    <a href="#">
                        برای دیدن آموزش نحوه ویرایش بنر ها کلیک کنید!
                    </a>
                </div>

                <br>

                {{--        Big Slider        --}}
               <div class="card card-light border-0 shadow-sm">
                   <div class="card-header bg-white">
                       <div class="card-title">اسلایدر بزرگ 436*872</div>
                   </div>
                   <div class="card-body">
                       <div class="col-12 ">
                           <!-- Custom Tabs -->
                           <div class="overflow-x-auto">
                               <table class="table">
                                   <!-- head -->
                                   <thead>
                                   <tr class="">
                                       <th>تصویر نمایه</th>
                                       <th>عنوان</th>
                                       <th>وضعیت</th>
                                       <th>عملیات</th>

                                   </tr>
                                   </thead>
                                   <tbody>
                                   @foreach($h1 as $banner)
                                   <tr >
                                       <th>
                                           <div class="">
                                               <div class="">
                                                   <img src="{{$banner->bimage}}" alt="{{$banner->bimage}}" style="height: 82px" class="img-thumbnail" />
                                               </div>
                                           </div>
                                       </th>
                                       <td>
                                           <div class="flex items-center gap-3">

                                               <div>
                                                   <div class="font-bold">{{$banner->bname}}</div>
                                               </div>
                                           </div>
                                       </td>
                                       <td>
                                           {{$banner->balt}}
                                       </td>
                                       <th>
                                           <a href="/admin/settings/home/{{$banner->id}}" class="btn btn-warning btn-xs">ویرایش</a>
                                       </th>
                                   </tr>
                                   @endforeach
                                   </tbody>
                                   <!-- foot -->
                                   <tfoot>
                                   <tr>
                                       <th>تصویر نمایه</th>
                                       <th>عنوان</th>
                                       <th>وضعیت</th>
                                       <th>عملیات</th>

                                   </tr>
                                   </tfoot>

                               </table>
                           </div>
                           <!-- ./card -->
                       </div>
                   </div>
               </div>
                {{--        Small Images        --}}
                <div class="card card-light border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <div class="card-title">بنر های کوچک کنار اسلایدر بزرگ 212*424</div>
                    </div>
                    <div class="card-body">
                        <div class="col-12 ">
                            <!-- Custom Tabs -->
                            <div class="overflow-x-auto">
                                <table class="table">
                                    <!-- head -->
                                    <thead>
                                    <tr class="">
                                        <th>تصویر نمایه</th>
                                        <th>عنوان</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($h2 as $banner)
                                    <tr >
                                        <th>
                                            <div class="">
                                                <div class="">
                                                    <img src="{{$banner->bimage}}" alt="{{$banner->balt}}" style="height: 82px" class="img-thumbnail" />
                                                </div>
                                            </div>
                                        </th>
                                        <td>
                                            <div class="flex items-center gap-3">

                                                <div>
                                                    <div class="font-bold">{{$banner->banme}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{$banner->balt}}
                                        </td>
                                        <th>
                                            <a href="/admin/settings/home/{{$banner->id}}" class="btn btn-warning btn-xs">ویرایش</a>
                                        </th>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <!-- foot -->
                                    <tfoot>
                                    <tr>
                                        <th>تصویر نمایه</th>
                                        <th>عنوان</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>

                                    </tr>
                                    </tfoot>

                                </table>
                            </div>
                            <!-- ./card -->
                        </div>
                    </div>
                </div>
                {{--        Wide Banner        --}}
                <div class="card card-light border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <div class="card-title">بنر پهن 167*1320</div>
                    </div>
                    <div class="card-body">
                        <div class="col-12 ">
                            <!-- Custom Tabs -->
                            <div class="overflow-x-auto">
                                <table class="table">
                                    <!-- head -->
                                    <thead>
                                    <tr class="">
                                        <th>تصویر نمایه</th>
                                        <th>عنوان</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($h3 as $banner)
                                    <tr >
                                        <th>
                                            <div class="">
                                                <div class="">
                                                    <img src="{{$banner->bimage}}" alt="{{$banner->balt}}" style="height: 82px" class="img-thumbnail" />
                                                </div>
                                            </div>
                                        </th>
                                        <td>
                                            <div class="flex items-center gap-3">

                                                <div>
                                                    <div class="font-bold">{{$banner->bname}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{$banner->balt}}
                                        </td>
                                        <th>
                                            <a href="/admin/settings/home/{{$banner->id}}" class="btn btn-warning btn-xs">ویرایش</a>
                                        </th>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <!-- foot -->
                                    <tfoot>
                                    <tr>
                                        <th>تصویر نمایه</th>
                                        <th>عنوان</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>

                                    </tr>
                                    </tfoot>

                                </table>
                            </div>
                            <!-- ./card -->
                        </div>
                    </div>
                </div>
                {{--        Four Banners        --}}
                <div class="card card-light border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <div class="card-title">بنر های چهارتایی 234*312</div>
                    </div>
                    <div class="card-body">
                        <div class="col-12 ">
                            <!-- Custom Tabs -->
                            <div class="overflow-x-auto">
                                <table class="table">
                                    <!-- head -->
                                    <thead>
                                    <tr class="">
                                        <th>تصویر نمایه</th>
                                        <th>عنوان</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($h4 as $banner)
                                    <tr >
                                        <th>
                                            <div class="">
                                                <div class="">
                                                    <img src="{{$banner->bimage}}" alt="{{$banner->balt}}" style="height: 82px" class="img-thumbnail" />
                                                </div>
                                            </div>
                                        </th>
                                        <td>
                                            <div class="flex items-center gap-3">

                                                <div>
                                                    <div class="font-bold">{{$banner->bname}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{$banner->balt}}
                                        </td>
                                        <th>
                                            <a href="/admin/settings/home/{{$banner->id}}" class="btn btn-warning btn-xs">ویرایش</a>
                                        </th>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <!-- foot -->
                                    <tfoot>
                                    <tr>
                                        <th>تصویر نمایه</th>
                                        <th>عنوان</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>

                                    </tr>
                                    </tfoot>

                                </table>
                            </div>
                            <!-- ./card -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
