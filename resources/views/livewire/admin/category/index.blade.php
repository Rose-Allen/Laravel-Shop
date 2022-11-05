<div>
    <div>
        <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Category Delete</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="destroyCategory">
                        <div class="modal-body">
                            <h6>Are you sure you want to delete this data?</h6>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Yes, Delete</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 grid-margin">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Category</h4>
                    <a href="{{route('admin.category.create')}}" class="btn btn-primary btn-sm float-end">Add
                        Category</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$category->id}}</th>
                                <td>{{$category->name}}</td>
                                <td>{{$category->status == '1' ? 'Hidden' : 'Visible'}}</td>
                                <td><a href="{{route('admin.category.edit', $category->id)}}"
                                       class="btn btn-primary">Edit</a>
                                    <a href="#" wire:click="deleteCategory({{$category->id}})" class="btn btn-danger"
                                       data-bs-toggle="modal"
                                       data-bs-target="#deleteModal">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@push('script')
    <script>
        window.addEventListener('close-modal', e => {
            $('#deleteModal').modal('hide');
        })
    </script>
@endpush
