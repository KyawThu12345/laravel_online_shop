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
                    <span></span>
                    <span></span> All Slides
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
                                        All Slides
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.home.slide.add') }}"
                                            class="btn btn-success float-end">Add New Slide</a>
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
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>TopTitle</th>
                                            <th>Title</th>
                                            <th>SubTitle</th>
                                            <th>Offer</th>
                                            <th>Link</th>
                                            <th>Category_text</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 0;
                                        @endphp
                                        @foreach ($slides as $slide)
                                        <tr key="{{ $slide->id }}">
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <img src="{{ asset('assets/imgs/shop/products/slide/' . $slide->image) }}"
                                                    width="80px" alt="">
                                            </td>
                                            <td>{{ $slide->top_title }}</td>
                                            <td>{{ $slide->title }}</td>
                                            <td>{{ $slide->sub_title}}</td>
                                            <td>{{ $slide->offer }}</td>
                                            <td>{{ $slide->link }}</td>
                                            <td>{{ $slide->category_text }}</td>
                                            <td>
                                                <a href="{{ route('admin.home.slide.edit',['slide_id'=>$slide->id]) }}"
                                                    class="text-info">Edit</a>
                                                <a href="#"
                                                    onclick="confirm('Are you sure, You want to delete this coupon?') || event.stopImmediatePropagation()"
                                                    wire:click.prevent='deleteSlide({{ $slide->id }})'
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
