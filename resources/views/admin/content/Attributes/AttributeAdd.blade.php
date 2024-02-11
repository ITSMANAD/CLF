@extends('admin.partials.master')
@section('title','افزودن ویژگی')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">افزودن ویژگی</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="{{route('ShopAttributeGroups')}}">لیست گروه ویژگی</a></li>
                            <li class="breadcrumb-item active">افزودن ویژگی</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="container-fluid">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="card bg-white">
                        <div class="card-header bg-white border-0">
                            <div class="card-title">افزودن</div>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="form-container">
                                    <form method="post" action="{{route('ShopAttributeAddStore')}}">
                                        @csrf
                                        @method('patch')
                                        <div class="mb-3">
                                            <label for="name" class="form-label">نام ویژگی:</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="نام ویژگی را وارد کنید!" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="price" class="form-label">قیمت افزوده بر محصول (تومان):</label>
                                            <input type="number" class="form-control" name="price" value="0" id="price" placeholder="قیمت را وارد کنید! (تومان)" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="attributeGroups" class="form-label">گروه ویژگی:</label>
                                            <select id="attributeGroups" name="attributeGroups" class="form-select">
                                                <option selected disabled>انتخاب کنید</option>
                                                @foreach($AttributeGroups as $AttributeGroup)
                                                <option value="{{$AttributeGroup->id}}">{{$AttributeGroup->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="d-grid ">
                                            <button type="submit" class="btn fs-5 text-white" style="background-color: #039645;">ثبت درخواست</button>
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
