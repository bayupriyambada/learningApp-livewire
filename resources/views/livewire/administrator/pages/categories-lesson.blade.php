<div>
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Kategori Pelajaran
                    </h2>

                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <input type="search" wire:model="search" class="form-control d-inline-block w-9 me-3"
                            placeholder="Cari data..." />
                        <a href="#" class="btn btn-primary" data-bs-target="#addData" data-bs-toggle="modal">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Tambah Data
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards" wire:poll.keep-alive>
                @forelse($categoriesLesson as $categories)
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body p-4 text-center">
                                <span class="avatar avatar-xl mb-3 avatar-rounded"
                                    style="background-image:
                                    url('https://ui-avatars.com/api/?name={{ $categories->name }}')"></span>
                                <h3 class="m-0 mb-1"><a href="#">{{ $categories->name }}</a></h3>
                            </div>
                            <div class="d-flex">
                                <a href="#" wire:click.prevent="showEdit({{ $categories }})" class="card-btn">
                                    Edit</a>
                                <a href="#" wire:click.prevent="showDelete({{ $categories }})" class="card-btn">
                                    Delete</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <span class="text-danger">No Categories Lesson Found!</span>
                @endforelse
            </div>
            <div class="d-flex mt-4">
                {{ $categoriesLesson->links('livewire::simple-bootstrap') }}
            </div>
        </div>
    </div>

    <!-- create Modal -->
    <div wire:ignore.self class="modal modal-blur fade" id="addData" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save()">
                        <div class="mb-3">
                            <label class="form-label">Name Categories (required)</label>
                            <input type="text" class="form-control" wire:model="name" name="example-text-input"
                                placeholder="Name Categories...">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- update Modal -->
    <div wire:ignore.self class="modal modal-blur fade" id="editData" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="edit()">
                        <input type="hidden" wire:model="dataId">
                        <div class="mb-3">
                            <label class="form-label">Name Categories (required)</label>
                            <input type="text" class="form-control" wire:model.defer="name"
                                name="example-text-input" placeholder="Name Categories...">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- delete -->
    <div class="modal modal-blur fade" wire:ignore.self id="deleteData" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 9v2m0 4v.01" />
                        <path
                            d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                    </svg>
                    <h3>Are you sure?</h3>
                    <input type="hidden" wire:model="dataId">
                    <div class="text-muted">Do you really want to remove {{ Str::upper($name) }} ?
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                    Cancel
                                </a></div>
                            <div class="col"><a href="#" wire:click.prevent="delete()"
                                    class="btn btn-danger w-100">
                                    Delete
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
