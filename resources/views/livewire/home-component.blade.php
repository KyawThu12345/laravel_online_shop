<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
        }

        .wishlisted {
            background-color: #F15412 !important;
            border: 1px solid transparent !important;
        }

        .wishlisted i {
            color: #fff !important;
        }
    </style>
    <main class="main">
        <section class="home-slider position-relative pt-50">
            <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
                @foreach ($slides as $slide)
                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">{{ $slide->top_title }}</h4>
                                    <h2 class="animated fw-900">{{ $slide->title }}</h2>
                                    <h1 class="animated fw-900 text-brand">{{ $slide->sub_title }}</h1>
                                    <p class="animated">{{ $slide->offer }}</p>
                                    <a class="animated btn btn-brush btn-brush-2" href="{{ route('shop') }}">{{
                                        $slide->category_text }}</a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated slider-1-2"
                                        src="{{ asset('assets/imgs/shop/products/slide/' . $slide->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </section>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="tab-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab"
                                data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one"
                                aria-selected="true">Featured</button>
                        </li>
                    </ul>
                    <a href="{{ route('shop') }}" class="view-more d-none d-md-flex me-5">View More<i
                            class="fi-rs-angle-double-small-right"></i></a>
                </div>
                <div class="row">
                    <div class="col-lg-8 me-5 ms-2">
                        <div class="row product-grid-5">
                            @php
                            $witems = Cart::instance('wishlist')->content()->pluck('id');
                            @endphp
                            @foreach ($products as $product)
                            <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                                <img class="default-img"
                                                    src="{{ asset('storage/assets/imgs/shop/products/' . $product->image) }}"
                                                    alt="{{ $product->name }}" />
                                            </a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        {{-- <div class="product-category">
                                            <a href="{{ route('shop') }}">Music</a>
                                        </div> --}}
                                        <h2><a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                                {{ $product->name }}</a></h2>
                                        <div class="rating-result" title="25%">
                                            <span>
                                                <span>{{ $product->rate }}%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>${{ $product->sale_price }} </span>
                                            <span class="old-price">${{ $product->regular_price }}</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#"
                                                wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})"><i
                                                    class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--pagination-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            {{ $products->links() }}
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
                        </div>
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                            <ul class="categories">
                                @foreach ($categories as $category)
                                <li><a href="{{ route('product.category',['slug'=>$category->slug]) }}">{{
                                        $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">New products</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            @foreach ($nproducts as $nproduct)
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{ asset('storage/assets/imgs/shop/products/' . $nproduct->image) }}"
                                        alt="{{ $product->name }}">
                                </div>
                                <div class="content pt-10">
                                    <h6><a href="{{ route('product.details', ['slug' => $product->slug]) }}">{{
                                            $nproduct->name }}</a></h6>
                                    <div class="product-price">
                                        <span>${{ $nproduct->sale_price }} </span>
                                    </div>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width:75%"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows">
                    </div>
                    <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                        @foreach ($nproducts as $nproduct)
                        <div class="product-cart-wrap small hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                        <img class="default-img"
                                            src="{{ asset('storage/assets/imgs/shop/products/' . $nproduct->image) }}"
                                            alt="">
                                    </a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="{{ route('product.details', ['slug' => $product->slug]) }}">{{
                                        $nproduct->name
                                        }}</a></h2>
                                <div class="rating-result" title="90%">
                                    <span>
                                        {{ $nproduct->rate }}%
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span>${{ $nproduct->sale_price }} </span>
                                    <span class="old-price">${{ $nproduct->regular_price }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@push('script')
<script>
    var sliderrange = $("#slider-range");
    var amountprice = $("#amount");
    $(function () {
        sliderrange.slider({
            range: true,
            min: 0,
            max: 1000,
            values: [0, 1000],
            slide: function (event, ui) {
                @this.set('min_value',ui.values[0]);
                @this.set('max_value',ui.values[1]);
            },
        });
    });
</script>
@endpush
