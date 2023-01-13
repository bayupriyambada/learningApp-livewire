<div>
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Data Siswa {{ $gradeLevel->grade }}
                    </h2>

                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <input type="search" wire:model="search" class="form-control d-inline-block w-9 me-3"
                            placeholder="Cari data..." />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            @if ($gradeLevel->count() > 0)
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Nik Siswa</th>
                        </tr>
                    </thead>
                    <tbody>

                            @foreach ($gradeLevel->students as $item)
                                <tr>
                                    <td class="text-muted">
                                        <b>{{ $item->name }}</b>
                                    </td>
                                    <td class="text-muted">
                                        <b>{{ $item->nik }}</b>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>

            </div>
            @else
            <div class="col-md-12 col-lg-12">
                <div class="card card-inactive">
                    <div class="card-body">
                        <p class=" empty-subtitle text-muted text-center">Kelas <b class="text-danger"> {{ $gradeLevel->grade }} </b> belum mempunyai siswa.</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

</div>
