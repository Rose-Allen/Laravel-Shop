@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.slider.store')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title">
                                @error('title')
                                <div class="text-danger">Необходимо заполнить поле!</div>
                                @enderror
                            </div>

                            <div class="mb-3 ">
                                <label>Description</label>
                                <textarea class="form-control" name="description"></textarea>
                                @error('description')
                                <div class="text-danger">Необходимо заполнить поле!</div>
                                @enderror
                            </div>

                            <div class="mb-3 ">
                                <label>Status</label><br/>
                                <input type="checkbox" name="status">
                            </div>

                            <div class="mb-3 ">
                                <label>Slider image</label><br/>
                                <input type="file" name="image">
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
