<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('order_message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('order_message') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 mt-10 ">
                                Order Details
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                @if ($order->status == 'ordered')
                                <a href="#"
                                    onclick="confirm('Are you sure, You want to cancel this order?') || event.stopImmediatePropagation()"
                                    wire:click.prevent='cancelOrder' style="margin-right:20px"
                                    class="btn btn-secondary text-end">Cancel
                                    Order</a>
                                @endif
                                <a href="{{ route('user.orders') }}" class="btn btn-success">My Orders</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <th>Order ID</th>
                            <td>{{ $order->id }}</td>
                            <th>Order Date</th>
                            <td>{{ $order->created_at }}</td>
                            <th>Status</th>
                            <td>{{ $order->status }}</td>
                            @if ($order->status == 'delivered')
                            <th>Delivery Date</th>
                            <td>{{ $order->delivered_date }}</td>
                            @elseif ($order->status == 'canceled')
                            <th>Cancellation Date</th>
                            <td>{{ $order->canceled_date }}</td>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Ordered Items
                    </div>
                    <div class="card-body">
                        <div class="wrap-item-in-cart">
                            <h4 class="box-title pb-20">Product Name</h4>
                            <ul class="products-cart">
                                <table class="table shopping-summery text-center clean">
                                    <thead>
                                        <tr class="main-heading">
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($order->OrderItems as $item)
                                            <td><img src="{{ asset('storage/assets/imgs/shop/products/' . $item->product->image)}}"
                                                    alt="{{ $item->product->name }}"></td>
                                            <td class="product-des product-name">
                                                <h5 class="product-name"><a
                                                        href="{{ route('product.details',['slug'=>$item->product->slug]) }}">
                                                        {{ $item->product->name }}</a>
                                                </h5>
                                            </td>
                                            <td class="price" data-title="Price">
                                                <span>${{ $item->price }}</span>
                                            </td>
                                            <td class="text-center" data-title="Stock">
                                                <h5>{{ $item->quantity }}</h5>
                                            </td>
                                            <td class="text-right" data-title="Cart">
                                                <span>${{ $item->price * $item->quantity }}</span>
                                            </td>
                                            @if ($order->status == 'delivered' && $item->rstatus == false)
                                            <td class="text-right" data-title="Cart">
                                                <span><a href="#">Write Review</a></span>
                                            </td>
                                            @endif
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </ul>
                        </div>
                        <div class="summary">
                            <div class="order-summary">
                                <hr>
                                <h4 class="title-box">
                                    Order Summary
                                </h4>
                                <hr>
                                <tr class="pt-4 pb-4">
                                    <p class="summary-info"><span class="title">Subtotal = </span>
                                        <b class="index">
                                            ${{ $order->subtotal }}
                                        </b>
                                    </p>
                                    <p class="summary-info"><span class="title">Tax = </span><b class="index">
                                            ${{ $order->tax }}</b>
                                    </p>
                                    <p class="summary-info"><span class="title">Shipping = </span><b class="index">
                                            Free Shipping</b>
                                    </p>
                                    <p class="summary-info"><span class="title">Total = </span><b class="index">
                                            ${{ $order->total }}</b>
                                    </p>
                                </tr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row p-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Billing Details
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>First Name</th>
                                <td>{{ $order->firstname }}</td>
                                <th>Last Name</th>
                                <td>{{ $order->lastname }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $order->mobile }}</td>
                                <th>Email</th>
                                <td>{{ $order->email }}</td>
                            </tr>
                            <tr>
                                <th>Line 1</th>
                                <td>{{ $order->line1 }}</td>
                                <th>Line 2</th>
                                <td>{{ $order->line2 }}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{ $order->city }}</td>
                                <th>Province</th>
                                <td>{{ $order->province }}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{ $order->country }}</td>
                                <th>Zipcode</th>
                                <td>{{ $order->zipcode }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if ($order->is_shipping_different)
        <div class="row p-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Shipping Details
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>First Name</th>
                                <td>{{ $order->shipping->firstname }}</td>
                                <th>Last Name</th>
                                <td>{{ $order->shipping->lastname }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $order->shipping->mobile }}</td>
                                <th>Email</th>
                                <td>{{ $order->shipping->email }}</td>
                            </tr>
                            <tr>
                                <th>Line 1</th>
                                <td>{{ $order->shipping->line1 }}</td>
                                <th>Line 2</th>
                                <td>{{ $order->shipping->line2 }}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{ $order->shipping->city }}</td>
                                <th>Province</th>
                                <td>{{ $order->shipping->province }}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{ $order->shipping->country }}</td>
                                <th>Zipcode</th>
                                <td>{{ $order->shipping->zipcode }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row p-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Transaction
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Transaction Mode</th>
                                <td>{{ $order->transaction->mode }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $order->transaction->status }}</td>
                            </tr>
                            <tr>
                                <th>Transaction Date</th>
                                <td>{{ $order->transaction->created_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
