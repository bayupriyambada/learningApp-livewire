<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item {{ request()->routeIs('administrator.dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('administrator.dashboard') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Monitoring
                            </span>
                        </a>
                    </li>
                    <li
                        class="nav-item dropdown
                        {{ request()->routeIs('administrator.categories.lesson', 'administrator.grade.level', 'administrator.school.year') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Data Pembelajaran
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item {{ request()->routeIs('administrator.school.year') ? 'active' : '' }}"
                                href="{{ route('administrator.school.year') }}">
                                Tahun Ajaran
                            </a>
                            <a class="dropdown-item {{ request()->routeIs('administrator.categories.lesson') ? 'active' : '' }}"
                                href="{{ route('administrator.categories.lesson') }}">
                                Kategori Pembelajaran
                            </a>
                            <a class="dropdown-item {{ request()->routeIs('administrator.grade.level') ? 'active' : '' }}"
                                href="{{ route('administrator.grade.level') }}">
                                Level Kelas
                            </a>
                        </div>
                    </li>
                    <li
                        class="nav-item dropdown
                        {{ request()->routeIs('administrator.teacher', 'administrator.student') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Data Pengguna
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item {{ request()->routeIs('administrator.teacher') ? 'active' : '' }}"
                                href="{{ route('administrator.teacher') }}">
                                Pengajar
                            </a>
                            <a class="dropdown-item {{ request()->routeIs('administrator.student') ? 'active' : '' }}"
                                href="{{ route('administrator.student') }}">
                                Siswa
                            </a>
                        </div>
                    </li>
                    <li
                        class="nav-item dropdown
                        {{ request()->routeIs('administrator.categories.lesson', 'administrator.grade.level') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Relasi
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item {{ request()->routeIs('administrator.categories.lesson') ? 'active' : '' }}"
                                href="{{ route('administrator.categories.lesson') }}">
                                Pengajar & Kelas
                            </a>
                            <a class="dropdown-item {{ request()->routeIs('administrator.grade.level') ? 'active' : '' }}"
                                href="{{ route('administrator.grade.level') }}">
                                Pengajar & Siswa
                            </a>
                        </div>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="#">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/file-text -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                    <line x1="9" y1="9" x2="10" y2="9" />
                                    <line x1="9" y1="13" x2="15" y2="13" />
                                    <line x1="9" y1="17" x2="15" y2="17" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Panduan Belajar
                            </span>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>
