@extends('layouts.app')
@section('title')
    {{$category->meta_title}}
@endsection
@section('meta_keyword')
    {{$category->meta_keyword}}
@endsection

@section('meta_description')
    {{$category->meta_description}}
@endsection



@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Наши Товары</h4>
                </div>
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
    </div>
@endsection
