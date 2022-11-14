@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                @if(session('message'))
                    <h4 class="alert alert-success">{{session('message')}}</h4>
                @endif
                <div class="card-body">
                    <form action="{{route('admin.product.update', $product->id)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('patch')
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
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-color-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-color" type="button" role="tab"
                                        aria-controls="pills-color" aria-selected="false">Product Color
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
                                            <option
                                                value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected': ''}}>
                                                {{$category->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="text-danger">Необходимо заполнить поле!</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input type="text" name="name" value="{{$product->name}}" class="form-control">
                                    @error('name')
                                    <div class="text-danger">Необходимо заполнить поле!</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Product Slug</label>
                                    <input type="text" name="slug" class="form-control" value="{{$product->slug}}">
                                    @error('slug')
                                    <div class="text-danger">Необходимо заполнить поле!</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Brand</label>
                                    <select name="brand" class="form-control">
                                        @foreach($brands as $brand)
                                            <option
                                                value="{{$brand->name}}" {{$brand->name == $product->brand ? 'selected': ''}}>
                                                {{$brand->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                    <div class="text-danger">Необходимо заполнить поле!</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Small Description</label>
                                    <textarea class="form-control" name="small_description"
                                              rows="4"> {{$product->small_description}}</textarea>
                                    @error('small_description')
                                    <div class="text-danger">Необходимо заполнить поле!</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description"
                                              rows="4">{{$product->description}}</textarea>
                                    @error('description')
                                    <div class="text-danger">Необходимо заполнить поле!</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="pills-seotag" role="tabpanel"
                                 aria-labelledby="pills-seotag-tab">
                                <div class="mb-3">
                                    <label>Meta title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                           value="{{$product->meta_title}}">
                                    @error('meta_title')
                                    <div class="text-danger">Необходимо заполнить поле!</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Meta Keyword</label>
                                    <textarea class="form-control" name="meta_keyword"
                                              rows="4">{{$product->meta_keyword}}</textarea>
                                    @error('meta_keyword')
                                    <div class="text-danger">Необходимо заполнить поле!</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label> Meta Description</label>
                                    <textarea class="form-control" name="meta_description"
                                              rows="4">{{$product->meta_description}}</textarea>
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
                                            <input type="text" class="form-control" name="original_price"
                                                   value="{{$product->original_price}}">
                                            @error('original_price')
                                            <div class="text-danger">Необходимо заполнить поле!</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Selling Price</label>
                                            <input type="text" class="form-control" name="selling_price"
                                                   value="{{$product->selling_price}}">
                                            @error('selling_price')
                                            <div class="text-danger">Необходимо заполнить поле!</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Quantity</label>
                                            <input type="number" class="form-control" name="quantity"
                                                   value="{{$product->quantity}}">
                                            @error('quantity')
                                            <div class="text-danger">Необходимо заполнить поле!</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Trending</label>
                                            <input type="checkbox" name="trending"
                                                   {{$product->trending == '1' ? 'checked' : ''}} style="width: 50px; height: 50px">
                                            @error('trending')
                                            <div class="text-danger">Необходимо заполнить поле!</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <input type="checkbox" name="status"
                                                   {{$product->status == '1' ? 'checked' : ''}} style="width: 50px; height: 50px">
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
                                    <input type="file" class="form-control" name="image[]" multiple>
                                    @error('image')
                                    <div class="text-danger">Необходимо заполнить поле!</div>
                                    @enderror
                                </div>
                                <div>
                                    @if($product->productImages)
                                        <div class="row">
                                            @foreach($product->productImages as $img)
                                                <div class="col-md-2">
                                                    <img src="{{asset($img->image)}}"
                                                         style="width: 100px; height: 100px;"
                                                         alt="img" class="me-4 border-5">
                                                    <a href="{{route('admin.product.destroyImage', $img->id)}}"
                                                       class="d-block">Remove</a>
                                                </div>
                                            @endforeach
                                            @else
                                                <h5>No Image Add</h5>
                                            @endif
                                        </div>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="pills-color" role="tabpanel"
                                 aria-labelledby="pills-details-tab">

                                <div class="mb-3">
                                    <h4>Add Product</h4>
                                    <label>Select Color</label>
                                    <hr/>
                                    <div class="row">
                                        @forelse($colors as $color)
                                            <div class="col-md-3">
                                                <div class="p-2 border mb-3">
                                                    Color: <input type="checkbox" name="colors[{{$color->id}}]"
                                                                  value="{{$color->id}}">
                                                    {{$color->name}}
                                                    <br/>
                                                    Quantity: <input type="number" name="colorquantity[{{$color->id}}]"
                                                                     style="width: 70px; border: 1px solid">
                                                </div>

                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                Colors Not Found
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Color Name</th>
                                            <th>Quantity</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $product->productColors as $productColor)
                                            <tr class="prod_color-tr">
                                                <td>
                                                    @if($productColor->color)
                                                        {{$productColor->color->name}}
                                                    @else
                                                        Color Not Found
                                                    @endif
                                                </td>


                                                <td>
                                                    <div class="input-group mb-3" style="width: 150px">
                                                        <input type="text" value="{{$productColor->quantity}}"
                                                               class="quantityProductColorBtn form-control form-control-sm">
                                                        <button type="button" value="{{$productColor->id}}"
                                                                class="updateProductColorBtn btn btn-primary btn-sm text-white">
                                                            Update
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" value="{{$productColor->id}}"
                                                            class="deleteProductColorBtn btn btn-danger btn-sm text-white">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection

@section('scripts')
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.updateProductColorBtn', function () {
                var product_id = "{{$product->id}}"
                var prod_color_id = $(this).val();
                var qty = $(this).closest('.prod_color-tr').find('.quantityProductColorBtn').val();
                console.log(qty)
                if (qty <= 0) {
                    alert('Quantity is required');
                    return false;
                }
                var data = {
                    'product_id': product_id,
                    'qty': qty
                }

                $.ajax({
                    type: "POST",
                    url: "/admin/product/product-color/"+prod_color_id,
                    data: data,
                    success: function (response) {
                        alert(response.message)
                    },
                    error: function (xhr){
                        console.log(xhr.responseText)
                    }

                })

            })
            $(document).on('click', '.deleteProductColorBtn', function () {
                var prod_color_id = $(this).val();
                var thisClick = $(this);

                $.ajax({
                    type: "GET",
                    url: "/admin/product/product-color/"+prod_color_id+"/delete",
                    success: function (response) {
                        thisClick.closest('.prod_color-tr').remove();
                    },
                    error: function (xhr){
                        console.log(xhr.responseText)
                    }

                })

            })
        })
    </script>
@endsection
