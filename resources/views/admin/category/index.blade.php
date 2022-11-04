@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Category</h4>
                    <a href="{{route('admin.category.create')}}" class="btn btn-primary btn-sm float-end">Add Category</a>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>

@endsection
