@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.category.update', $category->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{$category->name}}">
                                @error('name')
                                <div class="text-danger">Необходимо заполнить поле!</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label>Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
                                @error('slug')
                                <div class="text-danger">Необходимо заполнить поле!</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Description</label>
                                <textarea rows="3" class="form-control" name="description">{{$category->description}}"</textarea>
                                @error('description')
                                <div class="text-danger">Необходимо заполнить поле!</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label>Image</label>
                                <input type="file" name="image">
                                <img src="{{asset('storage/' . $category->image)}}" alt="{{$category->image}}" width="60px" height="60px">
                                @error('image')
                                <div class="text-danger">Необходимо заполнить поле!</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label>Status</label><br/>
                                <input type="checkbox" name="status" value="{{$category->status == '1' ? 'checked' : ''}}">
                            </div>

                            <div class="mb-3 col-md-12">
                                <h4>Seo Tags</h4>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" value="{{$category->meta_title}}">
                                @error('meta_title')
                                <div class="text-danger">Необходимо заполнить поле!</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12 ">
                                <label>Meta Keyword</label>
                                <input type="text" class="form-control" name="meta_keyword" value="{{$category->meta_keyword}}">
                                @error('meta_keyword')
                                <div class="text-danger">Необходимо заполнить поле!</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Meta Description</label>
                                <input type="text" class="form-control" name="meta_description" value="{{$category->meta_description}}">
                                @error('meta_description')
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
