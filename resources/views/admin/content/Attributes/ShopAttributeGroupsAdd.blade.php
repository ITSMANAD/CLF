@extends('admin.partials.master')
@section('title','افزودن گروه ویژگی')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">افزودن گروه ویژگی</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="{{route('ShopAttributeGroups')}}">لیست گروه ویژگی</a></li>
                            <li class="breadcrumb-item active">افزودن گروه ویژگی</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card bg-white">
                        <div class="card-header bg-white border-0">
                            <div class="card-title">افزودن</div>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="form-container">
                                    <form method="post" action="{{route('ShopAttributeGroupsAddStore')}}">
                                        @csrf
                                        @method('patch')
                                        <div class="mb-3">
                                            <label for="name" class="form-label">نام گروه:</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="نام گروه ویژگی را وارد کنید!" required>
                                        </div>
                                        <div class="d-grid ">
                                            <button type="submit" class="btn fs-5 text-white" style="background-color: #039645;">ثبت اطلاعات</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
