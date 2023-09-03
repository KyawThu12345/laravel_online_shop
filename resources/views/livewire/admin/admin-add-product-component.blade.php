<div class="container m-5">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            Add New Product
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
                    <form method="POST" enctype="multipart/form-data" wire:submit.prevent='addProduct'>
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
                            <label class="col-md-12 control-label">Rate</label>
                            <input type="number" placeholder="Rate Number" class="form-control input-md"
                                wire:model="rate" />
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">Stock</label>
                            <div class="col-md-12">
                                <select class="form-control" wire:model="stock_status">
                                    <option value="instock">Instock</option>
                                    <option value="outofstock">Out of Stock</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">Quantity</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Quantity" class="form-control input-md"
                                    wire:model="quantity" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">Product Image</label>
                            <div class="col-md-12">
                                <input type="file" class="input-file p-2" wire:model="image" />
                                @if($image)
                                <img src="{{ $image->temporaryUrl() }}" width="120" />
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
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
