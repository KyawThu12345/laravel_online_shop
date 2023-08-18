<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span>
                    <a href="{{ route('shop') }}">Shop</a>
                    <span></span> All Coupons
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        All Coupons
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.addcoupon') }}" class="btn btn-success float-end">Add
                                            New Coupon</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Coupon Code</th>
                                            <th>Coupon Type</th>
                                            <th>Coupon Value</th>
                                            <th>Cart Value</th>
                                            <th>Expiry Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $coupon)
                                        <tr>
                                            <td>{{ $coupon->id }}</td>
                                            <td>{{ $coupon->code }}</td>
                                            <td>{{ $coupon->type }}</td>
                                            @if ($coupon->type == 'fixed')
                                            <td>${{ $coupon->value }}</td>
                                            @else
                                            <td>{{ $coupon->value }}%</td>
                                            @endif
                                            <td>${{ $coupon->cart_value }}</td>
                                            <td>{{ $coupon->expiry_date }}</td>
                                            <td>
                                                <a href="{{ route('admin.editcoupon',['coupon_id'=>$coupon->id]) }}"
                                                    class="text-info">Edit</a>
                                                <a href="#"
                                                    onclick="confirm('Are you sure, You want to delete this coupon?') || event.stopImmediatePropagation()"
                                                    wire:click.prevent='deleteCoupon({{ $coupon->id }})'
                                                    style="margin-left:10px">Delete</a>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
