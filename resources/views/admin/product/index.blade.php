@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Product</h4>
                    <a href="{{route('admin.product.create')}}" class="btn btn-primary btn-sm float-end">Add
                        Product</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                            <tr>
                                <th scope="row">{{$product->id}}</th>
                                <td>
                                    @if($product->category)
                                        {{$product->category->name}}
                                    @else
                                        No Category
                                    @endif
                                </td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->selling_price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->status == '1' ? 'Hidden' : 'Visible'}}</td>
                                <td>
                                    <a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{route('admin.product.delete', $product->id)}}" onclick="return confirm('Are you sure to delete this product')" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Product Not Found</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
