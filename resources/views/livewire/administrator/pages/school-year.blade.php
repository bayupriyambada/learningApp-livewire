<div>
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Tahun Ajaran
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
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter table-mobile-md card-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Status</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($schoolYears as $school)
                                        <tr>
                                            <td data-label="Name">
                                                <div class="d-flex py-1 align-items-center">

                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $loop->iteration }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-label="Name">
                                                <div class="d-flex py-1 align-items-center">

                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $school->year }}</div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td data-label="Title">
                                                <div>
                                                    @if ($school->is_active == 1)
                                                        <div class="text-success">Aktif</div>
                                                    @else
                                                        <div class="text-danger">Tidak Aktif</div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <a href="#" class="btn">
                                                        Lihat Data
                                                    </a>
                                                    @if ($school->is_active == 1)
                                                        <a href="#" class="btn"
                                                            wire:click.prevent="showEdit({{ $school->id }})">
                                                            Ubah Data
                                                        </a>
                                                    @endif
                                                    <a href="#" class="btn"
                                                        wire:click.prevent="showDelete({{ $school->id }})"> Hapus </a>
                                                </div>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-danger py-2">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex mt-4">
                {{ $schoolYears->links() }}
            </div>
        </div>
    </div>

    <!-- create Modal -->
    <div wire:ignore.self class="modal modal-blur fade" id="addData" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="save()" autocomplete="off">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label required">Tahun Ajaran</label>
                            <input type="text" class="form-control" wire:model.defer="year"
                                name="example-text-input" placeholder="2022/2023">
                            <span class="text-danger">
                                @error('year')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3" wire:ignore>
                            <div class="form-label">Select</div>
                            <select class="form-select js-example-responsive" style="width: 100%" wire:model="is_active"
                                id="isActive">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            {{-- <select class="form-select" wire:model.defer="is_active">
                                <option>-- Pilih Status --</option>
                                <option value="0">Tidak Aktif</option>
                                <option value="1">Aktif</option>
                            </select> --}}
                            <span class="text-danger">
                                @error('is_active')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- update Modal -->
    <div wire:ignore.self class="modal modal-blur fade" id="editData" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="edit()" autocomplete="off">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label required">Tahun Ajaran</label>
                            <input type="text" class="form-control" wire:model.defer="year"
                                name="example-text-input" placeholder="2022/2023">
                            <span class="text-danger">
                                @error('year')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Status</div>
                            <select class="form-select" wire:model.defer="is_active">
                                <option>-- Pilih Status --</option>
                                <option value="0">Tidak Aktif</option>
                                <option value="1">Aktif</option>
                            </select>
                            <span class="text-danger">
                                @error('is_active')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ubah Perubahan</button>
                    </div>
                </form>
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
                    <h3>Apakah kamu yakin?</h3>
                    <input type="hidden" wire:model="dataId">
                    <div class="text-muted">Jika yakin data <b class="text-danger">{{ Str::upper($year) }}</b>
                        dihapus, maka semua data
                        yang ada
                        relasi ikut dihapus juga ?
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

@push('js')
    <script>
        document.addEventListener('livewire:load', function() {
            // Get the value of the "count" property
            $(document).ready(function() {
                $('#isActive').select2();
                $('#isActive').on('change', function(e) {
                    var data = $('#isActive').select2("val");
                    @this.set('is_active', data);
                });
            });
        })
    </script>
@endpush
