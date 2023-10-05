<div class="container m-5">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            Edit Product
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('admin.products') }}" class="btn btn-success">All
                                Product</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" wire:submit.prevent='updateProduct'>
                        <div class="form-group">
                            <label class="col-md-12 control-label">Product Name</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Product Name" class="form-control input-md"
                                    wire:model="name" wire:keyup='generateSlug' />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">Product Slug</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Product Slug" class="form-control input-md"
                                    wire:model="slug" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">Short Description</label>
                            <div class="col-md-12">
                                <textarea class="form-control" placeholder="Short Description"
                                    wire:model="short_description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">Description</label>
                            <div class="col-md-12">
                                <textarea class="form-control" placeholder="Description"
                                    wire:model="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">Regular Price</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Regular Price" class="form-control input-md"
                                    wire:model="regular_price" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">Sale Price</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Sale Price" class="form-control input-md"
                                    wire:model="sale_price" />
                            </div>
                        </div>
                        <div class="form-group">
<<<<<<< HEAD
=======
                            <label class="col-md-12 control-label">SKU</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">Featured</label>
                            <div class="col-md-12">
                                <select class="form-control" wire:model="featured">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
>>>>>>> 3d5486bdc804e03d6b411aa5f3fcd2c038a37f7e
                            <label class="col-md-12 control-label">Quantity</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Quantity" class="form-control input-md"
                                    wire:model="quantity" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">Product Image</label>
                            <div class="col-md-12">
                                <input type="file" class="input-file p-2" wire:model="newimage" />
                                @if($newimage)
                                <img src="{{ $newimage->temporaryUrl() }}" width="120" />
                                @else
                                @if ($product)
                                <img src="{{ asset('storage/assets/imgs/shop/products/' . $product->image) }}"
                                    alt="120">
                                @endif
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">Category</label>
                            <div class="col-md-12">
                                <select class="form-control" wire:model="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label"></label>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
