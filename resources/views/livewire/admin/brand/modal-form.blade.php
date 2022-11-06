<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storeBrand">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Brand Name</label>
                        <input type="text" class="form-control" placeholder="Name" wire:model.defer="name">
                        @error('name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Brand Slug</label>
                        <input type="text" class="form-control" placeholder="Slug" wire:model.defer="slug">
                        @error('slug')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Brand Status</label><br/>
                        <input type="checkbox" wire:model.defer="status"> Checked=hidden, Un-Checked=Visible
                        @error('status')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>

    </div>
</div>


<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div wire:loading>
                <div class="d-flex justify-content-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div> Loading...
                </div>
            </div>
            <div wire:loading.remove>
                <form wire:submit.prevent="update">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Brand Name</label>
                            <input type="text" class="form-control" placeholder="Name" wire:model.defer="name">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Brand Slug</label>
                            <input type="text" class="form-control" placeholder="Slug" wire:model.defer="slug">
                            @error('slug')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Brand Status</label><br/>
                            <input type="checkbox" wire:model.defer="status"> Checked=hidden, Un-Checked=Visible
                            @error('status')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Brand Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyBrand">
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
