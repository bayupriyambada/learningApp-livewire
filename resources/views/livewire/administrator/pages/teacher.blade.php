<div>
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Data Pengajar
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
                            Tambah Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards" wire:poll.keep-alive>
                @forelse($teachers as $teacher)
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body p-4 text-center">
                                <span class="avatar avatar-xl mb-3 avatar-rounded"
                                    style="background-image:
                                    url('https://ui-avatars.com/api/?name={{ $teacher->name }}')"></span>
                                <h3 class="m-0 mb-1"><a href="#">{{ $teacher->name }}</a></h3>
                                <div class="mt-3">
                                    <span class="badge bg-green-lt">NIK. {{ $teacher->nik }}</span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <a href="#" wire:click.prevent="showDetail({{ $teacher }})" class="card-btn">
                                    Detail</a>
                                <a href="#" wire:click.prevent="showEdit({{ $teacher }})" class="card-btn">
                                    Edit</a>
                                <a href="#" wire:click.prevent="showDelete({{ $teacher }})" class="card-btn">
                                    Delete</a>
                            </div>
                            <div class="d-flex">
                                <a href="#" wire:click.prevent="activate({{ $teacher->id }})"
                                    class="card-btn  @if ($teacher->is_active === 1) btn btn-dark disabled w-100 hidden @endif">
                                    {{ $teacher->is_active === 0 ? 'Belum Aktif' : 'Telah Aktif' }}</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <span class="text-danger">No Data Found!</span>
                @endforelse
            </div>
            <div class="d-flex mt-4">
                {{ $teachers->links('livewire::simple-bootstrap') }}
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
                <div class="modal-body">
                    <form wire:submit.prevent="save()" autocomplete="off">
                        <div class="mb-3">
                            <label for="fullName" class="form-label required">Nama Lengkap</label>
                            <input type="text" id="fullName" class="form-control" wire:model.defer="name"
                                name="example-text-input" placeholder="Masukkan nama lengkap">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label required">Email Aktif</label>
                            <input type="email" id="email" class="form-control" wire:model.defer="email"
                                name="example-text-input" placeholder="Masukkan email aktif">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="nik" class="form-label required">Nik</label>
                            <input type="text" id="nik" class="form-control" wire:model.defer="nik"
                                name="example-text-input" placeholder="Masukkan Nik">
                            <span class="text-danger">
                                @error('nik')
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
    <div wire:ignore.self class="modal modal-blur fade" id="editData" tabindex="-1" role="dialog"
        aria-hidden="true">
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
                            <label for="fullName" class="form-label required">Nama Lengkap</label>
                            <input type="text" id="fullName" class="form-control" wire:model.defer="name"
                                name="example-text-input" placeholder="Masukkan nama lengkap">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label required">Email Aktif</label>

                            <input type="email" id="email" class="form-control readonly disabled"
                                wire:model.defer="email" name="example-text-input" disabled readonly
                                placeholder="Masukkan email aktif">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="nik" class="form-label required">Nik</label>
                            <input type="text" id="nik" class="form-control" wire:model.defer="nik"
                                name="example-text-input" placeholder="Masukkan Nik">
                            <span class="text-danger">
                                @error('nik')
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
    <!-- Detail Modal -->
    <div wire:ignore.self class="modal modal-blur fade" id="detailData" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail {{ $name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" wire:model="dataId">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <tbody>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td class="text-muted">
                                        <b>{{ $name }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td class="text-muted">
                                        <b>{{ $email }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nik</td>
                                    <td class="text-muted">
                                        <b>{{ $nik }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pendidikan Terakhir</td>
                                    <td class="text-muted">
                                        <b>{{ $educationDegree ?? 'Belum ter-isi' }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td class="text-muted">
                                        <b>{{ $address ?? 'Belum ter-isi' }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td class="text-muted">
                                        <b>{{ $phoneNumber ?? 'Belum ter-isi' }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir</td>
                                    <td class="text-muted">
                                        <b>{{ $dateOfPlace ?? 'Belum ter-isi' }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td class="text-muted">
                                        <b>{{ $dateOfBirth ?? 'Belum ter-isi' }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tentang Anda</td>
                                    <td class="text-muted">
                                        <b>{{ $biography ?? 'Belum ter-isi' }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status Akun</td>
                                    <td class="text-muted">
                                        <b>{{ $biography === 0 ? 'Tidak Aktif' : 'Telah Aktif' }}</b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
