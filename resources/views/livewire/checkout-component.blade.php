<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <form wire:submit.prevent="placeOrder">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-25">
                                <h4>Billing Details</h4>
                            </div>
                            <div method="post" class="billing-address">
                                <div class="form-group">
                                    <input type="text" required="" name="fname" placeholder="First name *"
                                        wire:model='firstname'>
                                    @error('firstname')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" required="" name="lname" placeholder="Last name *"
                                        wire:model='lastname'>
                                    @error('lastname')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="billing_address" required="" placeholder="Address *"
                                        wire:model='line1'>
                                    @error('line1')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="billing_address2" required="" placeholder="Address line2"
                                        wire:model='line2'>
                                </div>
                                <div class="form-group">
                                    <input required="" type="text" name="province" placeholder="Province *"
                                        wire:model='province'>
                                    @error('province')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input required="" type="text" name="city" placeholder="City / Town *"
                                        wire:model='city'>
                                    @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input required="" type="text" name="country" placeholder="State / County *"
                                        wire:model='country'>
                                    @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input required="" type="text" name="zip-code" placeholder="Postcode / ZIP *"
                                        wire:model='zipcode'>
                                    @error('zipcode')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input required="" type="text" name="phone" placeholder="Phone *"
                                        wire:model='mobile'>
                                    @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input required="" type="text" name="email" placeholder="Email address *"
                                        wire:model='email'>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="custome-checkbox">
                                <label class="label_info collapsed" data-bs-toggle="collapse"
                                    data-target="#collapseAddress" href="#collapseAddress"
                                    aria-controls="collapseAddress" for="different-add" aria-expanded="false">
                                    <input name="different-add" id="different-add" value="1" type="checkbox"
                                        wire:model='ship_to_different'
                                        style="width: 16px; margin:0;vertical-align: middle;">
                                    <span style="vertical-align: middle;">Ship to a different address?</span>
                                </label>
                            </div>
                            <div id="collapsePassword" class="form-group create-account collapse in">
                                <input required="" type="password" placeholder="Password" name="password">
                            </div>
                            @if ($ship_to_different)
                            <div class="container mt-50">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-25">
                                            <h4>Shipping Details</h4>
                                        </div>
                                        <div method="post" class="billing-address">
                                            <div class="form-group">
                                                <input type="text" required="" name="fname" placeholder="First name *"
                                                    wire:model='s_firstname'>
                                                @error('s_firstname')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="text" required="" name="lname" placeholder="Last name *"
                                                    wire:model='s_lastname'>
                                                @error('s_lastname')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="billing_address" required=""
                                                    placeholder="Address *" wire:model='s_line1'>
                                                @error('s_line1')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="billing_address2" required=""
                                                    placeholder="Address line2" wire:model='s_line2'>
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="text" name="province" placeholder="Province *"
                                                    wire:model='s_province'>
                                                @error('s_province')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="text" name="city" placeholder="City / Town *"
                                                    wire:model='s_city'>
                                                @error('s_city')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="text" name="country"
                                                    placeholder="State / County *" wire:model='s_country'>
                                                @error('s_country')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="text" name="zip-code"
                                                    placeholder="Postcode / ZIP *" wire:model='s_zipcode'>
                                                @error('s_zipcode')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="text" name="phone" placeholder="Phone *"
                                                    wire:model='s_mobile'>
                                                @error('s_mobile')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="text" name="email"
                                                    placeholder="Email address *" wire:model='s_email'>
                                                @error('s_email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="mb-20">
                                <h5>Additional information</h5>
                            </div>
                            <div class="form-group mb-30">
                                <textarea rows="5" placeholder="Order notes"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-25">
                                <h4>Order Details</h4>
                            </div>
                            <div class="order_review mt-27">
                                <div class="mb-20">
                                    <h4>Your Orders</h4>
                                </div>
                                <div class="table-responsive order_table text-center">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Product</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (Cart::instance('cart')->content() as $item)
                                            <tr>
                                                <td class="image product-thumbnail"><img
                                                        src="{{ asset('storage/assets/imgs/shop/products/' . $item->model->image)}}"
                                                        alt="#"></td>
                                                <td><i class="ti-check-box font-small text-muted mr-10"></i>
                                                    <h5><a
                                                            href="{{ route('product.details',['slug'=>$item->model->slug]) }}">{{
                                                            $item->model->name }}</a></h5>
                                                    <span class="product-qty">x {{ $item->qty }}</span>
                                                </td>
                                                <td>${{ $item->total() }}</td>
                                            </tr>
                                            <tr>
                                                <th>SubTotal</th>
                                                <td class="product-subtotal" colspan="2">${{ $item->subtotal }}</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <td colspan="2"><em>Free Shipping</em></td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td colspan="2" class="product-subtotal"><span
                                                        class="font-xl text-brand fw-900">${{ $item->total() }}</span>
                                                </td>
                                            </tr>
                                            @if (Session::has('coupon'))
                                            <tr>
                                                <th>Total After Discount</th>
                                                <td class="product-subtotal" colspan="2">${{
                                                    number_format(session('discounted_values.totalAfterDiscount'), 2) }}
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                <div class="payment_method">
                                    <div class="mb-25">
                                        <h5>Payment</h5>
                                    </div>
                                    @if ($paymentmode == 'card')
                                    <script>
                                        window.location.href = "{{ route('payment') }}";
                                    </script>
                                    @endif
                                    <div class="payment_option">
                                        <div class="custome-radio">
                                            <input class="form-check-input" required="" type="radio" value="cod"
                                                name="payment_option" id="exampleRadios3" wire:model="paymentmode">
                                            <label class="form-check-label" for="exampleRadios3"
                                                data-bs-toggle="collapse" data-target="#cashOnDelivery"
                                                aria-controls="cashOnDelivery">Cash On
                                                Delivery</label>
                                        </div>
                                        <div class="custome-radio">
                                            <input class="form-check-input" required="" value="card" type="radio"
                                                name="payment_option" id="exampleRadios4" wire:model="paymentmode">
                                            <label class="form-check-label" for="exampleRadios4"
                                                data-bs-toggle="collapse" data-target="#cardPayment"
                                                aria-controls="cardPayment">Card Payment</label>
                                        </div>
                                        <div class="custome-radio">
                                            <input class="form-check-input" required="" type="radio"
                                                name="payment_option" id="exampleRadios5" wire:model="paymentmode">
                                            <label class="form-check-label" for="exampleRadios5"
                                                data-bs-toggle="collapse" data-target="#paypal"
                                                aria-controls="paypal">Paypal</label>
                                        </div>
                                        @error('paymentmode')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                @if ($thankyou)
                                @this.set('thankyou', false)
                                @livewire('thank-you-component')
                                @endif
                                <button type="button" class="btn btn-fill-out btn-block mt-30"
                                    wire:click="placeOrder">Place order now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </main>
</div>
