<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="/" rel="nofollow">Home</a>
            <span></span> Admin
            <span></span> All Products
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
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                All Products
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="{{ route('admin.addproduct') }}" class="btn btn-success">Add
                                    Product</a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card-header">
                        All Products
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('admin.addproduct') }}" class="btn btn-success">Add
                            Product</a>
                    </div> --}}
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Rate</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        <img src="{{ asset('storage/assets/imgs/shop/products/' . $product->image) }}"
                                            width="100px" />

                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->stock_status }}</td>
                                    <td>{{ $product->regular_price }}</td>
                                    <td>{{ $product->rate }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.editproduct',['product_slug'=>$product->slug]) }}"
                                            class="text-info">Edit</a>
                                        <a href="#"
                                            onclick="confirm('Are you sure, You want to delete this product?') || event.stopImmediatePropagation()"
                                            wire:click.prevent='deleteProduct({{ $product->id }})'
                                            style="margin-left:10px">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
