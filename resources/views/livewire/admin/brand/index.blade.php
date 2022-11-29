<div>

    @include('livewire.admin.brand.modal-form')

    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Brand list</h4>
                    <a class="btn btn-primary float-end" href="#" data-bs-toggle="modal" data-bs-target="#addModal">Add
                        Brands</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($brands as $brand)
                            <tr>
                                <th scope="row">{{$brand->id}}</th>
                                <td>{{$brand->name}}</td>
                                <td>{{$brand->slug}}</td>
                                <td>{{$brand->category->name}}</td>
                                <td>{{$brand->status == 1 ? 'Hidden' : 'Visible'}}</td>
                                <td>
                                    <a href="#" wire:click="editBrand({{$brand->id}})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                                    <a href="#" wire:click="deleteBrand({{$brand->id}})" data-bs-toggle="modal"
                                       data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                @empty
                                    <td colspan="5"><h1 class="text-center">No Brands found</h1></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{$brands->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        window.addEventListener('close-modal', e => {
            $('#addModal').modal('hide');
            $('#editModal').modal('hide');
            $('#deleteModal').modal('hide');
        })
    </script>
@endpush

