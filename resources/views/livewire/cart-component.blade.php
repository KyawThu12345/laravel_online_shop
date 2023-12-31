<div>
    <style>
        .IS {
            width: 15px;
            height: 14px;
        }

        .TS {
            font-size: 17px;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Your Cart
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            @if (Session::has('success_message'))
                            <div class="alert alert-success">
                                <strong>Success | {{ session('success_message') }}</strong>
                            </div>
                            @endif
                            @if (Session::has('coupon_message'))
                            <div class="alert alert-info">
                                {{ Session::get('coupon_message') }}
                            </div>
                            @endif
                            @if (Cart::instance('cart')->count() > 0)
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Cart::instance('cart')->content() as $item)
                                    <tr>
                                        <td class="image product-thumbnail"><img
                                                src="{{ asset('storage/assets/imgs/shop/products/' . $item->model->image)}}"
                                                alt="#"></td>
                                        <td class="product-des product-name">
                                            <h5 class="product-name"><a
                                                    href="{{ route('product.details',['slug'=>$item->model->slug]) }}">{{
                                                    $item->model->name }}</a>
                                            </h5>
                                        </td>
                                        <td class="price" data-title="Price">
                                            <span>${{ $item->model->sale_price }}</span>
                                        </td>
                                        <td class="text-center" data-title="Stock">
                                            <div class="detail-qty border radius  m-auto">
                                                <a href="#" class="qty-down"
                                                    wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')"><i
                                                        class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val">{{ $item->qty }}</span>
                                                <a href="#" class="qty-up"
                                                    wire:click.prevent="increaseQuantity('{{ $item->rowId }}')"><i
                                                        class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                        </td>
                                        <td class="text-right" data-title="Cart">
                                            <span>${{ $item->subtotal }}</span>
                                        </td>
                                        <td class="action" data-title="Remove"><a href="#" class="text-muted"
                                                wire:click.prevent="destroy('{{ $item->rowId }}')"><i
                                                    class="fi-rs-trash"></i></a></td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6" class="text-end">
                                            <a href="#" class="text-muted" wire:click.prevent="clearAll()"> <i
                                                    class="fi-rs-cross-small"></i>
                                                Clear Cart</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @else
                            <p>No item in cart</p>
                            @endif
                        </div>
                        <div class="cart-action text-end">
                            <a href="{{ route('shop') }}" class="btn "><i class="fi-rs-shopping-bag mr-10"></i>Continue
                                Shopping</a>
                        </div>
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                        <div class="row mb-50">
                            <div class="col-lg-12 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>Cart Totals</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="cart_total_label">Cart Subtotal</td>
                                                    <td class="cart_total_amount"><span
                                                            class="font-lg fw-900 text-brand">
                                                            ${{Cart::instance('cart')->subtotal()}}</span>
                                                    </td>
                                                </tr>
                                                @if (Session::has('coupon'))
                                                <tr>
                                                    <td class="cart_total_label">
                                                        Discount ({{Session::get('coupon')['code'] }})
                                                        <a href="#" wire:click.prevent="removeCoupon"><i
                                                                class="fa fa-times text-danger"></i></a>
                                                    </td>
                                                    <td class="cart_total_amount">
                                                        <span class="font-lg fw-900 text-brand">
                                                            ${{number_format($discount,2) }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Subtotal with Discount</td>
                                                    <td class="cart_total_amount">
                                                        <span class="font-lg fw-900 text-brand">
                                                            ${{number_format($subtotalAfterDiscount,2) }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">
                                                        Tax ({{config('cart.tax')}}%)
                                                    </td>
                                                    <td class="cart_total_amount">
                                                        <span class="font-lg fw-900 text-brand">
                                                            ${{number_format($taxAfterDiscount,2) }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Total</td>
                                                    <td class="cart_total_amount"><strong><span
                                                                class="font-xl fw-900 text-brand">
                                                                ${{number_format($totalAfterDiscount,2)}}
                                                            </span></strong>
                                                    </td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <td class="cart_total_label">Tax</td>
                                                    <td class="cart_total_amount"><span
                                                            class="font-lg fw-900 text-brand">
                                                            ${{Cart::instance('cart')->tax() }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Shipping</td>
                                                    <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free
                                                        Shipping</td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Total</td>
                                                    <td class="cart_total_amount"><strong><span
                                                                class="font-xl fw-900 text-brand">
                                                                ${{Cart::instance('cart')->total()}}</span></strong>
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mb-30 mt-50">
                                        <div class="heading_s1 mb-3">
                                            <h4>Apply Coupon</h4>
                                        </div>
                                        <div class="checkout-info">
                                            @if (!Session::has('coupon'))
                                            <label class="checkout-field">
                                                <input type="checkbox" class="frm-input IS" name="have-code"
                                                    id="have-code" value="1" wire:model="haveCouponCode" />
                                                <span class="TS text-warning">Have coupon code ??</span>
                                            </label>
                                            @if ($haveCouponCode == 1)
                                            <div class="total-amount">
                                                <div class="left">
                                                    <div class="coupon">
                                                        <form action="#" target="_blank"
                                                            wire:submit.prevent='applyCouponCode'>
                                                            <div class="form-row row justify-content-center">
                                                                @if (Session::has('coupon_message'))
                                                                <div class="alert alert-danger" role="danger">
                                                                    {{ Session::get('coupon_message') }}</div>
                                                                @endif
                                                                <div class="form-group col-lg-6">
                                                                    <input class="font-medium" name="coupon-code"
                                                                        wire:model="couponCode"
                                                                        placeholder="Enter Your Coupon">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <button type="submit" class="btn  btn-sm"><i
                                                                            class="fi-rs-label mr-10"></i>Apply</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                    <?php
                                    $paymentIntent = "your_payment_intent_value"; // Replace with your actual payment intent value
                                    $checkoutRoute = route('shop.checkout', ['paymentIntent' => $paymentIntent]);
?>
                                    @if (Auth::user())
                                    <a href="{{ $checkoutRoute }}" class="btn "> <i class="fi-rs-box-alt mr-10"
                                            wire:click='placeOrder'></i>
                                        Proceed To CheckOut</a>
                                    @else
                                    <a href="{{ route('login') }}" class="btn "> <i class="fi-rs-box-alt mr-10"></i>
                                        Proceed To CheckOut</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
