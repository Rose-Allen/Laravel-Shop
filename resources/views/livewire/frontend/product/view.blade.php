<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        @if($product->productImages)
                            <img src="{{asset($product->productImages[0]->image)}}" class="w-100" alt="Img">
                        @else
                            "Фото товара не найдена!"
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{$product->name}}
                            <label class="label-stock bg-success">In Stock</label>
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{$product->category->name}} / {{$product->name}}
                        </p>
                        <div>
                            <span class="selling-price">{{$product->selling_price}}₸</span>
                            <span class="original-price">{{$product->original_price}}₸</span>
                        </div>
                        <div>
                            @if($product->productColors->count() > 0)
                                @if($product->productColors)
                                    @foreach($product->productColors as $ColorItem)
                                        {{--                                        <input type="radio" name="colorSelection"--}}
                                        {{--                                               value="{{$ColorItem->id}}">{{$ColorItem->color->name}}--}}
                                        <label class="colorSelectionLabel"
                                               style="background-color: {{$ColorItem->color->code}}"
                                               wire:click="colorSelected({{$ColorItem->id}})"
                                        >

                                            {{$ColorItem->color->name}}
                                        </label>

                                    @endforeach
                                @endif
                                <div>
                                    @if($this->productColorSelectedQantity == "outOfStock")
                                        <label class="btn-sm  px-1 py-1 mt-2 text-white bg-danger">Out of Stock</label>
                                    @elseif($this->productColorSelectedQantity > 0)
                                        <label class="btn-sm px-1 py-1 mt-2 text-white bg-success">In Stock</label>
                                    @endif
                                </div>

                            @else
                                @if($product->quantity)

                                    <label class="btn-sm px-1 py-1 mt-2 text-white bg-success">In Stock</label>
                                @else
                                    <label class="btn-sm  px-1 py-1 mt-2 text-white bg-danger">Out of Stock</label>
                                @endif
                            @endif
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                <input type="text" value="1" class="input-quantity"/>
                                <span class="btn btn1"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                            <a href="" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </a>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {{$product->small_description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{$product->description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
