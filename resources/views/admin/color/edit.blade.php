@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.color.update', $color->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{$color->name}}">
                                @error('name')
                                <div class="text-danger">Необходимо заполнить поле!</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label>Code</label>
                                <input type="text" class="form-control" name="code" value="{{$color->code}}">
                                @error('code')
                                <div class="text-danger">Необходимо заполнить поле!</div>
                                @enderror
                            </div>


                            <div class="mb-3 col-md-6">
                                <label>Status</label><br/>
                                <input type="checkbox" name="status" {{$color->status == 'on' ? 'checked' : ''}}">
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
