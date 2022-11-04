@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name">
                                @error('name')
                                <div class="text-danger">Необходимо заполнить поле!</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label>Slug</label>
                                <input type="text" class="form-control" name="slug">
                                @error('slug')
                                <div class="text-danger">Необходимо заполнить поле!</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Description</label>
                                <textarea rows="3" class="form-control" name="description"></textarea>
                                @error('description')
                                <div class="text-danger">Необходимо заполнить поле!</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label>Image</label>
                                <input type="file" name="image">
                                @error('image')
                                <div class="text-danger">Необходимо заполнить поле!</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label>Status</label><br/>
                                <input type="checkbox" name="status">
                            </div>

                            <div class="mb-3 col-md-12">
                                <h4>Seo Tags</h4>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Meta Title</label>
                                <input type="text" class="form-control" name="meta_title">
                                @error('meta_title')
                                <div class="text-danger">Необходимо заполнить поле!</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12 ">
                                <label>Meta Keyword</label>
                                <input type="text" class="form-control" name="meta_keyword">
                                @error('meta_keyword')
                                <div class="text-danger">Необходимо заполнить поле!</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Meta Description</label>
                                <input type="text" class="form-control" name="meta_description">
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
