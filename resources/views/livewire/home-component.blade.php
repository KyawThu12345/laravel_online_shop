<div>
    <main class="main">
        <section class="home-slider position-relative pt-50">
            <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
                {{-- <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">Trade-in offer</h4>
                                    <h2 class="animated fw-900">Supper value deals</h2>
                                    <h1 class="animated fw-900 text-brand">On all products</h1>
                                    <p class="animated">Save more with coupons & up to 70% off</p>
                                    <a class="animated btn btn-brush btn-brush-3" href="{{ route('shop') }}"> Shop Now
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated slider-1-1" src="assets/imgs/slider/slider-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
                                        $slide->status }}</a>
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
        <section class="featured section-padding position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{ asset('assets/imgs/theme/icons/feature-1.png') }}" alt="">
                            <h4 class="bg-1">Free Shipping</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{ asset('assets/imgs/theme/icons/feature-2.png') }}" alt="">
                            <h4 class="bg-3">Online Order</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{ asset('assets/imgs/theme/icons/feature-3.png') }}" alt="">
                            <h4 class="bg-2">Save Money</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{ asset('assets/imgs/theme/icons/feature-4.png') }}" alt="">
                            <h4 class="bg-4">Promotions</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{ asset('assets/imgs/theme/icons/feature-5.png') }}" alt="">
                            <h4 class="bg-5">Happy Sell</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{ asset('assets/imgs/theme/icons/feature-6.png') }}" alt="">
                            <h4 class="bg-6">24/7 Support</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-tabs section-padding position-relative wow fadeIn animated animated animated"
            style="visibility: visible;">
            <div class="bg-square"></div>
            <div class="container">
                <div class="tab-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab"
                                data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one"
                                aria-selected="true">Featured</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two"
                                type="button" role="tab" aria-controls="tab-two" aria-selected="false">Popular</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three"
                                type="button" role="tab" aria-controls="tab-three" aria-selected="false">New
                                added</button>
                        </li>
                    </ul>
                    <a href="{{ route('shop') }}" class="view-more d-none d-md-flex">View More<i
                            class="fi-rs-angle-double-small-right"></i></a>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content wow fadeIn animated animated animated" id="myTabContent"
                    style="visibility: visible;">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            @php
                            $witems = Cart::instance('wishlist')->content()->pluck('id');
                            @endphp
                            @foreach ($products as $product)
                            <div class="col-lg-3 col-md-4 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                                <img class="default-img"
                                                    src="{{ asset('storage/assets/imgs/shop/products/' . $product->image) }}"
                                                    alt="{{ $product->name }}" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up"
                                                href="{{ route('product.details', ['slug' => $product->slug]) }}"
                                                data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                <i class="fi-rs-search"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <h2><a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                                {{ $product->name }}</a></h2>
                                        <div class="rating-result" title="25%">
                                            <span>
                                                <span>{{ $product->rate }}%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>${{ $product->regular_price }}</span>
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
                    </div>
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
</div>
</section>
</div>
</section>
<section class="banner-2 section-padding pb-0">
    <div class="container">
        <div class="banner-img banner-big wow fadeIn animated f-none">
            <img src="assets/imgs/banner/banner-4.png" alt="">
            <div class="banner-text d-md-block d-none">
                <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
                <h1 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h1>
                <a href="{{ route('shop') }}" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>
<section class="popular-categories section-padding mt-15 mb-25">
    <div class="container wow fadeIn animated">
        <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
        <div class="carausel-6-columns-cover position-relative">
            <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows">
            </div>
            <div class="carausel-6-columns" id="carausel-6-columns">
                <div class="card-1">
                    <figure class=" img-hover-scale overflow-hidden">
                        <a href="{{ route('shop') }}"><img src="assets/imgs/shop/category-thumb-1.jpg" alt=""></a>
                    </figure>
                    <h5><a href="{{ route('shop') }}">T-Shirt</a></h5>
                </div>
                <div class="card-1">
                    <figure class=" img-hover-scale overflow-hidden">
                        <a href="{{ route('shop') }}"> <img src="assets/imgs/shop/category-thumb-2.jpg" alt=""></a>
                    </figure>
                    <h5><a href="{{ route('shop') }}">Bags</a></h5>
                </div>
                <div class="card-1">
                    <figure class=" img-hover-scale overflow-hidden">
                        <a href="{{ route('shop') }}"><img src="assets/imgs/shop/category-thumb-3.jpg" alt=""></a>
                    </figure>
                    <h5><a href="{{ route('shop') }}">Sandan</a></h5>
                </div>
                <div class="card-1">
                    <figure class=" img-hover-scale overflow-hidden">
                        <a href="{{ route('shop') }}"><img src="assets/imgs/shop/category-thumb-4.jpg" alt=""></a>
                    </figure>
                    <h5><a href="{{ route('shop') }}">Scarf Cap</a></h5>
                </div>
                <div class="card-1">
                    <figure class=" img-hover-scale overflow-hidden">
                        <a href="{{ route('shop') }}"><img src="assets/imgs/shop/category-thumb-5.jpg" alt=""></a>
                    </figure>
                    <h5><a href="{{ route('shop') }}">Shoes</a></h5>
                </div>
                <div class="card-1">
                    <figure class=" img-hover-scale overflow-hidden">
                        <a href="{{ route('shop') }}"><img src="assets/imgs/shop/category-thumb-6.jpg" alt=""></a>
                    </figure>
                    <h5><a href="{{ route('shop') }}">Pillowcase</a></h5>
                </div>
                <div class="card-1">
                    <figure class=" img-hover-scale overflow-hidden">
                        <a href="{{ route('shop') }}"><img src="assets/imgs/shop/category-thumb-7.jpg" alt=""></a>
                    </figure>
                    <h5><a href="{{ route('shop') }}">Jumpsuits</a></h5>
                </div>
                <div class="card-1">
                    <figure class=" img-hover-scale overflow-hidden">
                        <a href="{{ route('shop') }}"><img src="assets/imgs/shop/category-thumb-8.jpg" alt=""></a>
                    </figure>
                    <h5><a href="{{ route('shop') }}">Hats</a></h5>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="banners mb-15">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="banner-img wow fadeIn animated">
                    <img src="assets/imgs/banner/banner-1.png" alt="">
                    <div class="banner-text">
                        <span>Smart Offer</span>
                        <h4>Save 20% on <br>Woman Bag</h4>
                        <a href="{{ route('shop') }}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="banner-img wow fadeIn animated">
                    <img src="assets/imgs/banner/banner-2.png" alt="">
                    <div class="banner-text">
                        <span>Sale off</span>
                        <h4>Great Summer <br>Collection</h4>
                        <a href="{{ route('shop') }}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-md-none d-lg-flex">
                <div class="banner-img wow fadeIn animated  mb-sm-0">
                    <img src="assets/imgs/banner/banner-3.png" alt="">
                    <div class="banner-text">
                        <span>New Arrivals</span>
                        <h4>Shop Today’s <br>Deals & Offers</h4>
                        <a href="{{ route('shop') }}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                    </div>
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
                                    src="{{ asset('storage/assets/imgs/shop/products/' . $nproduct->image) }}" alt="">
                            </a>
                        </div>
                        <div class="product-action-1">
                            <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php"
                                tabindex="0"><i class="fi-rs-heart"></i></a>
                        </div>
                        <div class="product-badges product-badges-position product-badges-mrg">
                            <span class="hot">Hot</span>
                        </div>
                    </div>
                    <div class="product-content-wrap">
                        <h2><a href="{{ route('product.details', ['slug' => $product->slug]) }}">{{ $nproduct->name
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
