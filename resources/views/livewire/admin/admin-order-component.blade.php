<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="/" rel="nofollow">Home</a>
            <span></span>
            <a href="{{ route('shop') }}">Admin</a>
            <span></span> All Orders
        </div>
    </div>
</div>
<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

        .D {
            background-color: dodgerblue;
            color: white;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        All Orders
                    </div>
                    <div class="card-body">
                        @if (Session::has('order_message'))
                        <div class="alert alert-success" role="alert">
                            {{ request()->session()->get('order_message') }}
                        </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>OrderId</th>
                                    <th colspan="2">Full Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Subtotal</th>
                                    <th>Discount</th>
                                    <th>Tax</th>
                                    <th>Total</th>
                                    <th>Zipcode</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                    <th colspan="2" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->firstname }}</td>
                                    <td>{{ $order->lastname }}</td>
                                    <td>{{ $order->mobile }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>${{ $order->subtotal }}</td>
                                    <td>${{ $order->discount }}</td>
                                    <td>${{ $order->tax }}</td>
                                    <td>${{ $order->total }}</td>
                                    <td>{{ $order->zipcode }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td><a href="{{ route('admin.orderdetails',['order_id'=> $order->id]) }}"
                                            class="D btn-sm">Details</a></td>
                                    <td>
                                        <div class="dropdown" data-bs-theme="light">
                                            <button class="btn btn-success btn-small dropdown-toggle" type="button"
                                                id="dropdownMenuButtonLight" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Status
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonLight">
                                                <li><a class="dropdown-item" href="#"
                                                        wire:click.prevent="updateOrderStatus({{ $order->id }},'delivered')">Delivered</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#"
                                                        wire:click.prevent="updateOrderStatus({{ $order->id }},'canceled')">Canceled</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
