@extends('layouts.master')
@section('title','محصول')
@section('content')
    <link rel="stylesheet" src="https://cdn.jsdelivr.net/npm/zoomist@1/dist/zoomist.min.css"/>
    <link rel="stylesheet" href="/css/ProductStyle.css">
    <div class="container">
        <div class="row  backg-grey rounded-4">
            <div class="col">
                <nav class="breadcrumb  backg-grey rounded-4 " style="position: relative;top: 10px;">
                    <a href="/">خانه</a>
                    <span>></span>
                    <a href="#">
                        @php
                            $Product_Category = \App\Models\Category::all()->whereIn('id',$Product->category)->first();
                        @endphp
                        {{$Product_Category->name}}
                    </a>
                    <span>></span>
                    <a href="#">{{$Product->name}}</a>
                </nav>
            </div>
            <script>
                const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="copy"]')
                const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
            </script>
            <div class="col text-start text-light m-5">
                <p class="hover-1-blue" data-bs-toggle="copy" data-bs-title="برای کپی کلیک کنید" id="copy"
                   onclick="copytoclip()">{{request()->url()}}</p>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col">
                @php
                    $Product_Gallery = \App\Models\Products_Gallery::all()->whereIn('PID',$Product->id)->first();
                    $Product_Inventory = \App\Models\products_inventory::all()->whereIn('PID',$Product->id)->first();
                    $AttributesProduct = \App\Models\attributes_product::all()->whereIn('PID',$Product->id);
                    $Brand = \App\Models\Brands::all()->whereIn('id',$Product->brand)->first();
                    $Product_Price = \App\Models\Products_Price::all()->whereIn('PID',$Product->id)->first();
                    $ProductSpecs2 = \App\Models\Products_Specs::all()->whereIn('PID',$Product->id)->take(2);
                @endphp
                <img src="{{$Product_Gallery->image}}" alt="{{$Product_Gallery->alt}}" width="392px" height="368px"
                     class="shadow rounded-2 img-thumbnail">
            </div>
            <div class="col-sm-5">
                <h3 class="fs-4 mt-2 fw-bold">{{$Product->name}}</h3>
                <p>{{$Product->intro}}</p>
                <p class="mt-3 fs-5">
                    موجودی در انبار : {{$Product_Inventory->number}} عدد
                </p>
                <br>
                @foreach($AttributesProduct as $AttributeProduct)
                    @php
                        $AttributeGroup = \App\Models\attributegroups::all()->find($AttributeProduct->attributegroup)->first();
                    @endphp
                    <div>
                        <p class="fw-bold">{{$AttributeGroup->name}} </p>
                        <div>
                            @php
                                $Attributes = \App\Models\Attributes::all()->whereIn('attributeGroup',$AttributeGroup->id);
                            @endphp
                            @foreach($Attributes as $Attribute)
                                <input type="checkbox" class="btn-check" id="{{$Attribute->id}}" autocomplete="off">
                                <label class="btn btn-secondary " for="{{$Attribute->id}}">{{$Attribute->name}}</label>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                <br>
                <div class="row">
                    @foreach($ProductSpecs2 as $ProductSpecs)
                        <div class="col me-2 rounded-3" style="background-color: #eaeaea;">
                            <p class="opacity-75">{{$ProductSpecs->title}}</p>
                            <p class="m-1 fw-bold">{{$ProductSpecs->value}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col">
                <div class="rounded-3 m-1 shadow"
                     style="background-color:#F7F7F7;height: 368px;border: 1px solid #eaeaea">
                    <div>
                        <p class="mx-auto center mt-5 fs-3 text-dark">{{number_format($Product_Price->price)}} <span
                                class="badge text-bg-light border-0">تومان</span></p>
                    </div>
                    <hr class="bg-secondary">
                    <div>
                        <p>اطلاعات پست</p>
                    </div>
                    <hr class="bg-secondary">
                    <div class="rate center">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>
                    <br>
                    <div class="d-grid gap-1 col-9 mx-auto">
                        <button class="btn shadow fs-5" style="background-color: #EC2F01;" type="button">افزودن به سبد خرید</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-light mt-5">
            <div class="row">
                <div class="container">
                    <div class="col-12 default no-padding">
                        <div class="product-tabs default">
                            <div class="box-tabs default">
                                <ul class="nav" role="tablist">
                                    <li class="box-tabs-tab">
                                        <a class="active" data-toggle="tab" href="#desc" role="tab" aria-expanded="true">
                                            <i class="now-ui-icons objects_umbrella-13"></i> نقد و بررسی
                                        </a>
                                    </li>
                                    <li class="box-tabs-tab">
                                        <a data-toggle="tab" href="#params" role="tab" aria-expanded="false">
                                            <i class="now-ui-icons shopping_cart-simple"></i> مشخصات
                                        </a>
                                    </li>
                                    <li class="box-tabs-tab">
                                        <a data-toggle="tab" href="#comments" role="tab" aria-expanded="false">
                                            <i class="now-ui-icons shopping_shop"></i> نظرات کاربران
                                        </a>
                                    </li>
                                    <li class="box-tabs-tab">
                                        <a data-toggle="tab" href="#questions" role="tab" aria-expanded="false">
                                            <i class="now-ui-icons ui-2_settings-90"></i> پرسش و پاسخ
                                        </a>
                                    </li>
                                </ul>
                                <div class="card-body default">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="desc" role="tabpanel" aria-expanded="true">
                                            <article>
                                                <h2 class="param-title">
                                                    نقد و بررسی تخصصی
                                                    <span>{{$Product->name}}</span>
                                                </h2>
                                                {{$Product->description}}
                                            </article>
                                        </div>
                                        <div class="tab-pane params" id="params" role="tabpanel" aria-expanded="false">
                                            <article>
                                                <h2 class="param-title">
                                                    مشخصات فنی
                                                    <span>{{$Product->name}}</span>
                                                </h2>
                                                <section>
                                                    <h3 class="params-title">مشخصات کلی</h3>
                                                    <ul class="params-list">
                                                        <li>
                                                            <div class="params-list-key">
                                                                <span class="block">ابعاد</span>
                                                            </div>
                                                            <div class="params-list-value">
                                                                    <span class="block">
                                                                        7.7 × 70.9 × 143.6 میلی‌متر
                                                                    </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="params-list-key">
                                                                <span class="block">توضیحات سیم کارت</span>
                                                            </div>
                                                            <div class="params-list-value">
                                                                    <span class="block">
                                                                        سایز نانو (8.8 × 12.3 میلی‌متر)
                                                                    </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="params-list-key">
                                                                <span class="block">وزن</span>
                                                            </div>
                                                            <div class="params-list-value">
                                                                    <span class="block">
                                                                        174 گرم
                                                                    </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="params-list-key">
                                                                <span class="block">ویژگی‌های خاص</span>
                                                            </div>
                                                            <div class="params-list-value">
                                                                    <span class="block">
                                                                        مقاوم در برابر آب , مناسب عکاسی , مناسب عکاسی
                                                                        سلفی , مناسب بازی , مجهز به حس‌گر تشخیص چهره
                                                                    </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="params-list-key">
                                                                <span class="block">تعداد سیم کارت</span>
                                                            </div>
                                                            <div class="params-list-value">
                                                                    <span class="block">
                                                                        تک سیم کارت
                                                                    </span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </section>
                                                <section>
                                                    <h3 class="params-title">پردازنده</h3>
                                                    <ul class="params-list">
                                                        <li>
                                                            <div class="params-list-key">
                                                                <span class="block">تراشه</span>
                                                            </div>
                                                            <div class="params-list-value">
                                                                    <span class="block">
                                                                        Apple A11 Bionic Chipset
                                                                    </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="params-list-key">
                                                                <span class="block">نوع پردازنده</span>
                                                            </div>
                                                            <div class="params-list-value">
                                                                    <span class="block">
                                                                        64 بیت
                                                                    </span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </section>
                                            </article>
                                        </div>
                                        <div class="tab-pane" id="comments" role="tabpanel" aria-expanded="false">
                                            <article>
                                                <h2 class="param-title">
                                                    نظرات کاربران
                                                    <span>۱۲۳ نظر</span>
                                                </h2>
                                                <div class="comments-area default">
                                                    <ol class="comment-list">
                                                        <!-- #comment-## -->
                                                        <li>
                                                            <div class="comment-body">
                                                                <div class="comment-author">
                                                                    <img alt="" src="assets/img/default-avatar.png" class="avatar"><cite class="fn">حسن</cite>
                                                                    <span class="says">گفت:</span> </div>

                                                                <div class="commentmetadata"><a href="#">
                                                                        اسفند ۲۰, ۱۳۹۶ در ۹:۴۱ ب.ظ</a> </div>

                                                                <p>لورم ایپسوم متن ساختگی</p>

                                                                <div class="reply"><a class="comment-reply-link" href="#">پاسخ</a></div>
                                                            </div>
                                                        </li>
                                                        <!-- #comment-## -->
                                                        <li>
                                                            <div class="comment-body">
                                                                <div class="comment-author">
                                                                    <img alt="" src="assets/img/default-avatar.png" class="avatar"><cite class="fn">رضا</cite>
                                                                    <span class="says">گفت:</span> </div>

                                                                <div class="commentmetadata"><a href="#">
                                                                        اسفند ۲۰, ۱۳۹۶ در ۹:۴۲ ب.ظ</a> </div>

                                                                <p>
                                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                                    صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                                </p>

                                                                <div class="reply"><a class="comment-reply-link" href="#">پاسخ</a></div>
                                                            </div>
                                                            <ol class="children">
                                                                <li>
                                                                    <div class="comment-body">
                                                                        <div class="comment-author">
                                                                            <img alt="" src="assets/img/default-avatar.png" class="avatar"><cite class="fn">بهرامی راد</cite> <span class="says">گفت:</span> </div>

                                                                        <div class="commentmetadata"><a href="#">
                                                                                اسفند ۲۰, ۱۳۹۶ در ۹:۴۷ ب.ظ</a>
                                                                        </div>

                                                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی
                                                                            نامفهوم از صنعت چاپ و با استفاده از
                                                                            طراحان گرافیک است.
                                                                            چاپگرها و متون بلکه روزنامه و مجله در
                                                                            ستون و سطرآنچنان که لازم است و برای
                                                                            شرایط فعلی تکنولوژی
                                                                            مورد نیاز و کاربردهای متنوع با هدف بهبود
                                                                            ابزارهای کاربردی می باشد.</p>

                                                                        <div class="reply"><a class="comment-reply-link" href="#">پاسخ</a></div>
                                                                    </div>
                                                                    <ol class="children">
                                                                        <li>
                                                                            <div class="comment-body">
                                                                                <div class="comment-author">
                                                                                    <img alt="" src="assets/img/default-avatar.png" class="avatar"> <cite class="fn">محمد</cite>
                                                                                    <span class="says">گفت:</span>
                                                                                </div>

                                                                                <div class="commentmetadata">
                                                                                    <a href="#">
                                                                                        خرداد ۳۰, ۱۳۹۷ در ۸:۵۳
                                                                                        ق.ظ</a> </div>

                                                                                <p>عالیه</p>

                                                                                <div class="reply"><a class="comment-reply-link" href="#">پاسخ</a></div>
                                                                            </div>
                                                                            <ol class="children">
                                                                                <li>
                                                                                    <div class="comment-body">
                                                                                        <div class="comment-author">
                                                                                            <img alt="" src="assets/img/default-avatar.png" class="avatar">
                                                                                            <cite class="fn">اشکان</cite>
                                                                                            <span class="says">گفت:</span>
                                                                                        </div>

                                                                                        <div class="commentmetadata">
                                                                                            <a href="#">
                                                                                                خرداد ۳۰, ۱۳۹۷ در
                                                                                                ۸:۵۳ ق.ظ</a> </div>

                                                                                        <p>لورم ایپسوم متن ساختگی با
                                                                                            تولید سادگی نامفهوم از
                                                                                            صنعت چاپ و با استفاده از
                                                                                            طراحان
                                                                                            گرافیک است. چاپگرها و
                                                                                            متون بلکه روزنامه و مجله
                                                                                            در ستون و سطرآنچنان که
                                                                                            لازم است و
                                                                                            برای شرایط فعلی تکنولوژی
                                                                                            مورد نیاز و کاربردهای
                                                                                            متنوع با هدف بهبود
                                                                                            ابزارهای
                                                                                            کاربردی می باشد.</p>

                                                                                        <div class="reply"><a class="comment-reply-link" href="#">پاسخ</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <!-- #comment-## -->
                                                                            </ol>
                                                                            <!-- .children -->
                                                                        </li>
                                                                        <!-- #comment-## -->
                                                                    </ol>
                                                                    <!-- .children -->
                                                                </li>
                                                                <!-- #comment-## -->
                                                            </ol>
                                                            <!-- .children -->
                                                        </li>
                                                        <!-- #comment-## -->
                                                        <li>
                                                            <div class="comment-body">
                                                                <div class="comment-author">
                                                                    <img alt="" src="assets/img/default-avatar.png" class="avatar"> <cite class="fn">جلال</cite>
                                                                    <span class="says">گفت:</span> </div>

                                                                <div class="commentmetadata"><a href="#">
                                                                        اسفند ۲۱, ۱۳۹۶ در ۱:۱۰ ب.ظ</a> </div>

                                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                                    صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                                    چاپگرها و
                                                                    متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                                                    لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                                                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می
                                                                    باشد.</p>

                                                                <div class="reply"><a class="comment-reply-link" href="">پاسخ</a></div>
                                                            </div>
                                                        </li>
                                                        <!-- #comment-## -->
                                                    </ol>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="tab-pane form-comment" id="questions" role="tabpanel" aria-expanded="false">
                                            <article>
                                                <h2 class="param-title">
                                                    افزودن نظر
                                                    <span>نظر خود را در مورد محصول مطرح نمایید</span>
                                                </h2>
                                                <form action="" class="comment">
                                                    <textarea class="form-control" placeholder="نظر" rows="5"></textarea>
                                                    <button class="btn btn-default">ارسال نظر</button>
                                                </form>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/ProductJS.js"></script>
@endsection
