@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.slider.update', $slider->id)}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{$slider->title}}">
                                @error('title')
                                <div class="text-danger">Необходимо заполнить поле!</div>
                                @enderror
                            </div>

                            <div class="mb-3 ">
                                <label>Description</label>
                                <textarea class="form-control" name="description">{{$slider->description}}</textarea>
                                @error('description')
                                <div class="text-danger">Необходимо заполнить поле!</div>
                                @enderror
                            </div>

                            <div class="mb-3 ">
                                <label>Status</label><br/>
                                <input type="checkbox" name="status" {{$slider->status == 1 ? 'checked' : ''}}>
                            </div>

                            <div class="mb-3 ">
                                <label>Slider image</label><br/>
                                <input type="file" name="image">
                                <img src="{{asset('storage/' . $slider->image)}}" alt="{{$slider->image}}" width="60px" height="60px">
                                @error('image')
                                <div class="text-danger">Необходимо заполнить поле!</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <input type="submit" class="btn btn-success" value="Добавить">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
