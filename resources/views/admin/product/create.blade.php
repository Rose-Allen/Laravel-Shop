@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">Home
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-seotag-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-seotag" type="button" role="tab"
                                        aria-controls="pills-seotag"
                                        aria-selected="false">Seo Tags
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-details-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-details" type="button" role="tab"
                                        aria-controls="pills-details" aria-selected="false">Details
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-image-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-image" type="button" role="tab"
                                        aria-controls="pills-image" aria-selected="false">Product Image
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade border p-3 show active" id="pills-home" role="tabpanel"
                                 aria-labelledby="pills-home-tab">
                                <div class="mb-3">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="text-danger">Необходимо заполнить поле!</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input type="text" name="name" class="form-control">
                                    @error('name')
                                    <div class="text-danger">Необходимо заполнить поле!</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Product Slug</label>
                                    <input type="text" name="slug" class="form-control">
                                    @error('slug')
                                    <div class="text-danger">Необходимо заполнить поле!</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Brand</label>
                                    <select name="brand" class="form-control">
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->name}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                    <div class="text-danger">Необходимо заполнить поле!</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Small Description</label>
                                    <textarea class="form-control" name="small_description" rows="4"></textarea>
                                    @error('small_description')
                                    <div class="text-danger">Необходимо заполнить поле!</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="4"></textarea>
                                    @error('description')
                                    <div class="text-danger">Необходимо заполнить поле!</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="pills-seotag" role="tabpanel"
                                 aria-labelledby="pills-seotag-tab">
                                <div class="mb-3">
                                    <label>Meta title</label>
                                    <input type="text" name="meta_title" class="form-control">
                                    @error('meta_title')
                                    <div class="text-danger">Необходимо заполнить поле!</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Meta Keyword</label>
                                    <textarea class="form-control" name="meta_keyword" rows="4"></textarea>
                                    @error('meta_keyword')
                                    <div class="text-danger">Необходимо заполнить поле!</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label> Meta Description</label>
                                    <textarea class="form-control" name="meta_description" rows="4"></textarea>
                                    @error('meta_description')
                                    <div class="text-danger">Необходимо заполнить поле!</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="tab-pane fade border p-3" id="pills-details" role="tabpanel"
                                 aria-labelledby="pills-details-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Original Price</label>
                                            <input type="text" class="form-control" name="original_price">
                                            @error('original_price')
                                            <div class="text-danger">Необходимо заполнить поле!</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Selling Price</label>
                                            <input type="text" class="form-control" name="selling_price">
                                            @error('selling_price')
                                            <div class="text-danger">Необходимо заполнить поле!</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Quantity</label>
                                            <input type="number" class="form-control" name="quantity">
                                            @error('quantity')
                                            <div class="text-danger">Необходимо заполнить поле!</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Trending</label>
                                            <input type="checkbox" name="trending" style="width: 50px; height: 50px">
                                            @error('trending')
                                            <div class="text-danger">Необходимо заполнить поле!</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <input type="checkbox" name="status" style="width: 50px; height: 50px">
                                            @error('status')
                                            <div class="text-danger">Необходимо заполнить поле!</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="pills-image" role="tabpanel"
                                 aria-labelledby="pills-details-tab">

                                <div class="mb-3">
                                    <label>Upload Product Image</label>
                                    <input type="file" class="form-control" name="image[]" multiple >
                                    @error('image')
                                    <div class="text-danger">Необходимо заполнить поле!</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
