@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Colors List</h4>
                    <a href="{{route('admin.color.create')}}" class="btn btn-primary btn-sm float-end">Add
                        Color</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Color Name</th>
                            <th scope="col">Color Color</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($colors as $color)
                            <tr>
                                <th scope="row">{{$color->id}}</th>
                                <td>{{$color->name}}</td>
                                <td>{{$color->code}}</td>
                                <td>{{$color->status == 1 ? 'Hidden' : 'Visible'}}</td>
                                <td>
                                    <a href="{{route('admin.color.edit', $color->id)}}"
                                       class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{route('admin.color.delete', $color->id)}}"
                                       onclick="return confirm('Are you sure to delete this product')"
                                       class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Color Not Found</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
