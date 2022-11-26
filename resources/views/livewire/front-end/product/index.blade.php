<div>
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-3">
                <div class="product-card">
                    <div class="product-card-img">
                        @if($product->quantity > 0)
                            <label class="stock bg-success">In Stock</label>
                        @else
                            <label class="stock bg-success">Out of Stock</label>
                        @endif
                        @if($product->productImages->count() > 0)
                            <a href="{{url('/collections/'.$product->category->slug.'/'.$product->slug)}}">
                                <img src="{{ asset($product->productImages[0]->image) }}"
                                     alt="{{$product->name}}">
                            </a>
                        @endif
                    </div>
                    <div class="product-card-body">
                        <p class="product-brand">{{$product->brand}}</p>
                        <h5 class="product-name">
                            <a href="{{url('/collections/'.$product->category->slug.'/'.$product->slug)}}">
                                {{$product->name}}
                            </a>
                        </h5>
                        <div>
                            <span class="selling-price">{{$product->selling_price}}₸</span>
                            <span class="original-price">{{$product->original_price}}₸</span>
                        </div>
                        {{--                            <div class="mt-2">--}}
                        {{--                                <a href="" class="btn btn1">Add To Cart</a>--}}
                        {{--                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>--}}
                        {{--                                <a href="" class="btn btn1"> View </a>--}}
                        {{--                            </div>--}}
                    </div>
                </div>
                @empty
                    <div style="margin-top: 100px">
                        <h1 class="text-center"> Товар {{$category->name}} не найдены!</h1>
                    </div>
            </div>
        @endforelse
    </div>
</div>
