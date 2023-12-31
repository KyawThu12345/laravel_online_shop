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
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Shop
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> We found <strong class="text-brand">{{ $products->total() }}</strong> items for you!
                                </p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{ $pageSize }}<i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{ $pageSize == 12 ? 'active' : '' }}" href="#"
                                                    wire:click.prevent="changePageSize(12)">12</a></li>
                                            <li><a class="{{ $pageSize == 15 ? 'active' : '' }}" href="#"
                                                    wire:click.prevent="changePageSize(15)">15</a></li>
                                            <li><a class="{{ $pageSize == 25 ? 'active' : '' }}" href="#"
                                                    wire:click.prevent="changePageSize(25)">25</a></li>
                                            <li><a class="{{ $pageSize == 32 ? 'active' : '' }}" href="#"
                                                    wire:click.prevent="changePageSize(32)">32</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> Default Sorting <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{ $orderBy == 'Default Sorting' ? 'active' : '' }}" href="#"
                                                    wire:click.prevent="changeOrderBy('Default Sorting')">
                                                    Default Sorting</a></li>
                                            <li><a class="{{ $orderBy == 'Price: Low to High' ? 'active' : '' }}"
                                                    href="#" wire:click.prevent="changeOrderBy('Price: Low to High')">
                                                    Price: Low to High</a></li>
                                            <li><a class="{{ $orderBy == 'Price: High to Low' ? 'active' : '' }}"
                                                    href="#" wire:click.prevent="changeOrderBy('Price: High to Low')">
                                                    Price: High to Low</a></li>
                                            <li><a class="{{ $orderBy == 'Sort By New' ? 'active' : '' }}" href="#"
                                                    wire:click.prevent="changeOrderBy('Sort By New')">Sort By New</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row product-grid-3">
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
                                                    {{--
                                                    C:\xampp\htdocs\laravel_online_shop\public\assets\imgs\shop\products\livewire-tmp\Y4ZjxQTTWoKAgc9U7oK7CAdLYkOMU9-metaaHVtYW4ucG5n-.jpg
                                                    --}} alt="{{ $product->name }}" />
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
                                            <span>${{ $product->sale_price }}</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            @if ($witems->contains($product->id))
                                            <a aria-label="Remove From Wishlist" class="action-btn hover-up wishlisted"
                                                href="#" wire:click.prevent="removeFromWishlist({{ $product->id }})"><i
                                                    class="fi-rs-heart"></i></a>
                                            @else
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#"
                                                wire:click.prevent="addToWishlist({{ $product->id }},'{{ $product->name }}',{{ $product->sale_price }})"><i
                                                    class="fi-rs-heart"></i></a>
                                            @endif
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#"
                                                wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->sale_price }})"><i
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
<<<<<<< HEAD
                                    <p class="price mb-0 mt-5">${{ $nproduct->regular_price }}</p>
=======
                                    <p class="price mb-0 mt-5">${{ $nproduct->sale_price }}</p>
>>>>>>> 3d5486bdc804e03d6b411aa5f3fcd2c038a37f7e
                                    <div class="product-rate">
                                        <div class="product-rating" style="width:75%"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none">
                            <img src="{{ asset('assets/imgs/banner/banner-11.jpg') }}" alt="">
                            <div class="banner-text">
                                <span>Women Zone</span>
                                <h4>Save 17% on <br>Office Dress</h4>
                                <a href="{{ route('shop') }}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
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
