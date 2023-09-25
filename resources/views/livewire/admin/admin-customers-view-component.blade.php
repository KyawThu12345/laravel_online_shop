<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="/" rel="nofollow">Home</a>
            <span></span>
            <a href="{{ route('shop') }}">Admin</a>
            <span></span> All Customers
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
                        All Customers
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Customer Id</th>
                                    <th class="text-center">Customer Name</th>
                                    <th class="text-center">Customer Email</th>
                                    <th class="text-center">Customer Created_at</th>
                                    <th class="text-center">Customer Updated_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr>
                                    <td class="text-center">{{ $customer->id }}</td>
                                    <td class="text-center">{{ $customer->name }}</td>
                                    <td class="text-center">{{ $customer->email }}</td>
                                    <td class="text-center">{{ $customer->created_at }}</td>
                                    <td class="text-centerw">{{ $customer->updated_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
