<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Edit Coupon
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
                                        Edit Coupon
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.coupons') }}" class="btn btn-success float-end">All
                                            Coupons</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                                @endif
                                <form wire:submit.prevent='updateCoupon'>
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Coupon Code</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter Coupon Code" wire:model="code" />
                                        @error('code')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Coupon Type</label>
                                        <div class="col-md-4">
                                            <select class="form-control" wire:model="type">
                                                <option value="">Select</option>
                                                <option value="fixed">Fixed</option>
                                                <option value="percent">Percent</option>
                                            </select>
                                            @error('type')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Coupon Value</label>
                                        <input type="text" name="coupon_value" class="form-control"
                                            placeholder="Enter Coupon Value" wire:model="value" />
                                        @error('value')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Cart Value</label>
                                        <input type="text" name="cart_value" class="form-control"
                                            placeholder="Enter Cart Value" wire:model="cart_value" />
                                        @error('cart_value')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Expiry Date</label>
                                        <div wire:ignore>
                                            <input type="date" id="expiry-date" name="expiry_date" class="form-control"
                                                placeholder="Enter Expiry Date" wire:model="expiry_date" />
                                            @error('expiry_date')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@push('script')
<script>
    $(function (){
        $('#expiry-date').datetimepicker({
            format: 'Y-MM-DD'
        })
        .on('dp.change',function (ev){
            var data = $('#expiry-date').val();
            @this.set('expiry_date',data);
        });
    });
</script>
@endpush
