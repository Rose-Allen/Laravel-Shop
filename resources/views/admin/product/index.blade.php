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

                </div>
            </div>
        </div>
    </div>
@endsection
