@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Slider List</h4>
                    <a href="{{route('admin.slider.create')}}" class="btn btn-primary btn-sm float-end">Add
                        Slider</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($sliders as $slider)
                            <tr>
                                <th scope="row">{{$slider->id}}</th>
                                <td>{{$slider->title}}</td>
                                <td>{{$slider->description}}</td>
                                <td><img src="{{asset('storage/' . $slider->image)}}" style="width: 70px; height: 70px" alt="img"></td>
                                <td>{{$slider->status == 1 ? 'Hidden' : 'Visible'}}</td>
                                <td>
                                    <a href="{{route('admin.slider.edit', $slider->id)}}"
                                       class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{route('admin.slider.delete', $slider->id)}}"
                                       onclick="return confirm('Are you sure to delete this product')"
                                       class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Sliders Not Found</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
