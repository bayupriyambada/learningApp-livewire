<div>
    <div class="page-wrapper">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <a href="#" class="btn btn-primary" data-bs-target="#addData" data-bs-toggle="modal">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Tambah Catatan
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Yang harus dilakukan</h3>
                                <span class="badge bg-red ms-2">{{ $todoCount }}</span>
                            </div>
                            <div class="list-group list-group-flush overflow-auto" style="max-height: 35rem">
                                @forelse ($todos as $todo)
                                    <div class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                <a href="#" class="text-body d-block">{{ $todo->name }}</a>
                                                <div class="text-muted mt-1">{{ $todo->description }}</div>
                                                <div class="mt-2">
                                                    <div class="row">
                                                        <div class="col">
                                                        </div>
                                                        <div class="col-auto">
                                                            <a href="#"
                                                                wire:click.prevent="showEdit({{ $todo->id }})"
                                                                class="link-muted text-orange">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-edit"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <path
                                                                        d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                                    </path>
                                                                    <path
                                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                                    </path>
                                                                    <path d="M16 5l3 3"></path>
                                                                </svg>
                                                            </a>
                                                            <a href="#"
                                                                wire:click.prevent="showDelete({{ $todo->id }})"
                                                                class="link-muted text-red">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-trash "
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <line x1="4" y1="7" x2="20"
                                                                        y2="7"></line>
                                                                    <line x1="10" y1="11" x2="10"
                                                                        y2="17"></line>
                                                                    <line x1="14" y1="11" x2="14"
                                                                        y2="17"></line>
                                                                    <path
                                                                        d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12">
                                                                    </path>
                                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3">
                                                                    </path>
                                                                </svg>
                                                            </a>
                                                            <a href="#"
                                                                wire:click="nextProgress({{ $todo->id }})"
                                                                class="link-muted text-yellow">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-arrow-narrow-right"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <line x1="5" y1="12"
                                                                        x2="19" y2="12"></line>
                                                                    <line x1="15" y1="16"
                                                                        x2="19" y2="12"></line>
                                                                    <line x1="15" y1="8"
                                                                        x2="19" y2="12"></line>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <span class="text-danger text-center py-2">Tidak ada catatan</span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sedang Berlangsung</h3>
                                <span class="badge bg-yellow ms-2">{{ $todoProgressCount }}</span>
                            </div>
                            <div class="list-group list-group-flush overflow-auto" style="max-height: 35rem">
                                @forelse ($todosProgress as $todo)
                                    <div class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                <a href="#" class="text-body d-block">{{ $todo->name }}</a>
                                                <div class="text-muted mt-1">{{ $todo->description }}</div>
                                                <div class="mt-2">
                                                    <div class="row">
                                                        <div class="col">
                                                        </div>
                                                        <div class="mt-2">
                                                            <div class="row">
                                                                <div class="col">
                                                                </div>
                                                                <div class="col-auto">
                                                                    <a href="#"
                                                                        wire:click="previosTodo({{ $todo->id }})"
                                                                        class="link-muted">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="icon icon-tabler icon-tabler-arrow-narrow-left"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" stroke-width="2"
                                                                            stroke="currentColor" fill="none"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none"></path>
                                                                            <line x1="5" y1="12"
                                                                                x2="19" y2="12"></line>
                                                                            <line x1="5" y1="12"
                                                                                x2="9" y2="16"></line>
                                                                            <line x1="5" y1="12"
                                                                                x2="9" y2="8"></line>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <a href="#"
                                                                        wire:click="nextCompleted({{ $todo->id }})"
                                                                        class="link-muted">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="icon icon-tabler icon-tabler-arrow-narrow-right"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" stroke-width="2"
                                                                            stroke="currentColor" fill="none"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none"></path>
                                                                            <line x1="5" y1="12"
                                                                                x2="19" y2="12"></line>
                                                                            <line x1="15" y1="16"
                                                                                x2="19" y2="12"></line>
                                                                            <line x1="15" y1="8"
                                                                                x2="19" y2="12"></line>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <span class="text-danger text-center py-2">Tidak ada data sedang berlangsung</span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Selesai</h3>
                                <span class="badge bg-green ms-2">{{ $todoCompletedCount }}</span>
                            </div>
                            <div class="list-group list-group-flush overflow-auto" style="max-height: 35rem">
                                @forelse ($todosCompleted as $todo)
                                    <div class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                <a href="#" class="text-body d-block">{{ $todo->name }}</a>
                                                <div class="text-muted mt-1">{{ $todo->description }}</div>
                                                <div class="mt-2">
                                                    <div class="row">
                                                        <div class="col">
                                                        </div>
                                                        <div class="mt-2">
                                                            <div class="row">
                                                                <div class="col">
                                                                </div>
                                                                <div class="col-auto">
                                                                    <a href="#"
                                                                        wire:click="previosProgress({{ $todo->id }})"
                                                                        class="link-muted">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="icon icon-tabler icon-tabler-arrow-narrow-left"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" stroke-width="2"
                                                                            stroke="currentColor" fill="none"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none"></path>
                                                                            <line x1="5" y1="12"
                                                                                x2="19" y2="12"></line>
                                                                            <line x1="5" y1="12"
                                                                                x2="9" y2="16"></line>
                                                                            <line x1="5" y1="12"
                                                                                x2="9" y2="8"></line>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <span class="text-danger text-center py-2">Tidak ada data yang
                                        terselesaikan.</span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Create Modal --}}
        <div wire:ignore.self class="modal modal-blur fade" id="addData" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="create()">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label required">Judul Catatan</label>
                                <input type="text" class="form-control" wire:model.defer="name"
                                    name="example-text-input" placeholder="Ketikan judul catatan anda...">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label required">Deskripsi Catatan</label>
                                <textarea id="text" class="form-control" cols="30" rows="2" wire:model.defer="description"></textarea>
                                <span class="text-danger">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Create Modal --}}
        {{-- Update Modal --}}
        <div wire:ignore.self class="modal modal-blur fade" id="editData" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="edit()">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label required">Judul Catatan</label>
                                <input type="text" class="form-control" wire:model="name"
                                    name="example-text-input" placeholder="Ketikan judul catatan anda...">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label required">Judul Catatan</label>
                                <textarea id="text" class="form-control" cols="30" rows="5" wire:model="description"></textarea>
                                <span class="text-danger">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Update Modal --}}

        {{-- Delete Modal Notes TODO --}}
        <div class="modal modal-blur fade" wire:ignore.self id="deleteData" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-danger"></div>
                    <div class="modal-body text-center py-4">
                        <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 9v2m0 4v.01" />
                            <path
                                d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                        </svg>
                        <h3>Are you sure?</h3>
                        <div class="text-muted">Apa anda yakin ingin menghapus {{ Str::upper($name) }} ?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                                <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                        Batal
                                    </a></div>
                                <div class="col"><a href="#" wire:click.prevent="delete()"
                                        class="btn btn-danger w-100">
                                        Hapus Data
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
