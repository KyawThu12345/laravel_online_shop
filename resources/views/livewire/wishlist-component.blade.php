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

        .product-cart-wrap .product-action-1 button:after,
        .product-cart-wrap .product-action-1 a.action-btn:after {
            left: -32%;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Wishlist
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row product-grid-4">
                    @if (Cart::instance('wishlist')->count() > 0)
                    @foreach (Cart::instance('wishlist')->content() as $item)
                    <div class="col-lg-3 col-md-3 col-6 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">
                                        <img class="default-img"
                                            src="{{ asset('storage/assets/imgs/shop/products/' . $item->model->image) }}"
                                            alt="{{ $item->model->name }}">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Quick View" class="action-btn hover-up" data-bs-toggle="modal"
                                        href="{{ route('product.details',['slug'=>$item->model->slug]) }}"
                                        data-bs-target="#quickViewModal">
                                        <i class="fi-rs-search"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                {{-- <div class="product-category">
                                    <a href="{{ route('shop') }}">Music</a>
                                </div> --}}
                                <h2><a href="{{ route('product.details',['slug'=>$item->model->slug]) }}">{{
                                        $item->model->name }}</a></h2>
                                <div class="rating-result" title="90%">
                                    <span>
                                        <span>90%</span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span>${{ $item->model->regular_price }}</span>
                                    {{-- <span class="old-price">$245.8</span> --}}
                                </div>
                                <div class="product-action-1 show">
                                    <a aria-label="Remove From Wishlist" class="action-btn hover-up wishlisted" href="#"
                                        wire:click.prevent="removeFromWishlist({{ $item->model->id }})"><i
                                            class="fi-rs-heart"></i></a>
                                    {{-- <a aria-label="Add To Cart" class="action-btn hover-up" href="#"
                                        wire:click.prevent="store({{ $item->model->id }},'{{ $item->model->name }}',{{ $item->model->regular_price }})"><i
                                            class="fi-rs-shopping-bag-add"></i></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <span>
                        <p>No item in Wishlist</p>
                    </span>
                    @endif
                </div>
            </div>
        </section>
    </main>
</div>
