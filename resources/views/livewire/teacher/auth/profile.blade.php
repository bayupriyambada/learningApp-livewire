<div>
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Pengaturan Akun
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-3 d-none d-md-block border-end">
                            <div class="card-body">
                                <h4 class="subheader">Business settings</h4>
                                <div class="list-group list-group-transparent">
                                    <a href="./settings.html"
                                        class="list-group-item list-group-item-action d-flex align-items-center active">Akun Saya</a>
                                </div>
                                <h4 class="subheader mt-4">Experience</h4>
                                <div class="list-group list-group-transparent">
                                    <a href="#" class="list-group-item list-group-item-action">Pengalaman Anda</a>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex flex-column">
                            <div class="card-body">
                                <h2 class="mb-4">Akun Saya</h2>
                                <h3 class="card-title">Detail Profil</h3>
                                <div class="row align-items-center">
                                    <div class="col-auto"><span class="avatar avatar-xl"
                                            style="background-image: url(./static/avatars/000m.jpg)"></span>
                                    </div>
                                    <div class="col-auto"><a href="#" class="btn">
                                            Ganti Avatar
                                        </a></div>
                                    <div class="col-auto"><a href="#" class="btn btn-ghost-danger">
                                            Hapus avatar
                                        </a></div>
                                </div>
                                <h3 class="card-title mt-4">Data Profil</h3>
                                <div class="row g-3">
                                    <div class="col-md">
                                        <div class="form-label">Nama</div>
                                        <input type="text" wire:model.defer="name" class="form-control" value="Tabler">
                                    </div>
                                    <div class="col-md">
                                        <div class="form-label">Nik</div>
                                        <input type="text" wire:model.defer="nik" class="form-control" value="560afc32">
                                    </div>
                                    <div class="col-md">
                                        <div class="form-label">Nomor Handphone</div>
                                        <input type="number" wire:model.defer="phoneNumber" class="form-control" placeholder="Input Nomor Handphone">
                                    </div>
                                    <div class="col-md">
                                        <div class="form-label">Pendidikan Terakhir</div>
                                        <input type="number" wire:model.defer="phoneNumber" class="form-control" placeholder="Input Nomor Handphone">
                                    </div>
                                    <div class="col-md">
                                        <div class="form-label">Nomor Handphone</div>
                                        <input type="number" wire:model.defer="phoneNumber" class="form-control" placeholder="Input Nomor Handphone">
                                    </div>
                                </div>
                                <h3 class="card-title mt-4">Email</h3>
                                <p class="card-subtitle">Dipastikan email yang anda gunakan aktif (tidak bisa diubah)</p>
                                <div>
                                    <div class="row g-2">
                                        <div class="col-auto">
                                            <input type="email" class="form-control w-auto"
                                                wire:model.defer="email" readonly disabled>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="card-title mt-4">Password</h3>
                                <p class="card-subtitle">Gantilah password default anda dengan yang diinginkan.</p>
                                <div>
                                    <a href="#" class="btn">
                                        Set new password
                                    </a>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent mt-auto">
                                <div class="btn-list justify-content-end">
                                    <a href="#" class="btn">
                                        Cancel
                                    </a>
                                    <a href="#" class="btn btn-primary">
                                        Submit
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer footer-transparent d-print-none">
            <div class="container-xl">
                <div class="row text-center align-items-center flex-row-reverse">
                    <div class="col-lg-auto ms-lg-auto">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item"><a href="./docs/" class="link-secondary">Documentation</a></li>
                            <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
                            <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank"
                                    class="link-secondary" rel="noopener">Source code</a></li>
                            <li class="list-inline-item">
                                <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary"
                                    rel="noopener">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                        </path>
                                    </svg>
                                    Sponsor
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item">
                                Copyright © 2022
                                <a href="." class="link-secondary">Tabler</a>.
                                All rights reserved.
                            </li>
                            <li class="list-inline-item">
                                <a href="./changelog.html" class="link-secondary" rel="noopener">
                                    v1.0.0-beta16
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
