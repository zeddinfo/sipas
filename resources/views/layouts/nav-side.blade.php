<!-- Sidebar -->
<nav class="navbar-vertical navbar">
    <div class="nav-scroller">

        <!-- Brand logo -->
        <a class="navbar-brand" href="@@webRoot/index.html">
            <img src="@@webRoot/assets/images/brand/logo/logo.svg" alt="" />
        </a>
        <!-- Admin nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">

            @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Ketua Umum') || Auth::user()->hasRole('Sekretaris'))

                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('admin.dashboard.index') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard.index') }}">
                        <i data-feather="home" class="nav-icon icon-xs me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('admin.setting.account.edit') ? 'active' : '' }}"
                        href="{{ route('admin.setting.account.edit') }}">
                        <i data-feather="user" class="nav-icon icon-xs me-2"></i> Pengaturan Akun
                    </a>
                </li>

                <!-- Nav item -->
                <li class="nav-item">
                    <div class="navbar-heading">Akses Surat</div>
                </li>

                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('admin.mail.ongoing.index') ? 'active' : '' }}"
                        href="{{ route('admin.mail.ongoing.index') }}">
                        <i data-feather="archive" class="nav-icon icon-xs me-2"></i> Dalam Proses
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('admin.mail.archived.index') ? 'active' : '' }}"
                        href="{{ route('admin.mail.archived.index') }}">
                        <i data-feather="archive" class="nav-icon icon-xs me-2"></i> Terarsip
                    </a>
                </li>

                <!-- Nav item -->
                <li class="nav-item">
                    <div class="navbar-heading">Super Admin Menu</div>
                </li>

                {{-- <li class="nav-item">
                    <div class="nav-link text-center">
                        <a class="btn btn-block btn-primary" href="{{ route('admin.setting.user.create') }}">
                            <i data-feather="plus" class="nav-icon icon-xs me-2"></i>
                            Tambah Pengguna
                        </a>
                    </div>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('admin.setting.user.index') ? 'active' : '' }}"
                        href="{{ route('admin.setting.user.index') }}">
                        <i data-feather="users" class="nav-icon icon-xs me-2"></i> Pengaturan Pengguna
                    </a>

                </li>

                <!-- Nav item -->
                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('admin.setting.*') ? 'collapsed' : '' }}"
                        href="#setting" data-bs-toggle="collapse" data-bs-target="#navUtilities" aria-expanded="false"
                        aria-controls="navUtilities">
                        <i data-feather="user-check" class="nav-icon icon-xs me-2">
                        </i> Pengaturan Admin
                    </a>
                    <div id="navUtilities" class="collapse {{ Request::routeIs('admin.setting.*') ? 'show' : '' }}"
                        data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::routeIs('admin.setting.level.index') ? 'active' : '' }}"
                                    href="{{ route('admin.setting.level.index') }}" aria-expanded="false">
                                    Jabatan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::routeIs('admin.setting.department.index') ? 'active' : '' }}"
                                    href="{{ route('admin.setting.department.index') }}" aria-expanded="false">
                                    Departemen
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::routeIs('admin.setting.mail.attribute.index') ? 'active' : '' }}"
                                    href="{{ route('admin.setting.mail.attribute.index') }}" aria-expanded="false">
                                    Atribut Surat
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            @endif

            @if (Auth::user()->hasRole('TU'))
                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('tu.dashboard.index') ? 'active' : '' }}"
                        href="{{ route('tu.dashboard.index') }}">
                        <i data-feather="home" class="nav-icon icon-xs me-2"></i> Dashboard
                    </a>
                </li>

                <!-- Nav item -->
                <li class="nav-item">
                    <div class="navbar-heading">Seluruh Surat</div>
                </li>

                <li class="nav-item">
                    <div class="nav-link text-center">
                        <a class="btn btn-block btn-primary" href="{{ route('tu.mail.in.create') }}">
                            <i data-feather="plus" class="nav-icon icon-xs me-2"></i>
                            Tambah Surat
                        </a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('tu.nail.in.index') ? 'active' : '' }}"
                        href="{{ route('tu.mail.in.index') }}">
                        <i data-feather="mail" class="nav-icon icon-xs me-2"></i> Surat Masuk
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('tu.mail.out.index') ? 'active' : '' }}"
                        href="{{ route('tu.mail.out.index') }}">
                        <i data-feather="inbox" class="nav-icon icon-xs me-2"></i> Surat Keluar
                    </a>

                </li>

                <!-- Nav item -->
                <li class="nav-item">
                    <div class="navbar-heading">Master Surat</div>
                </li>

                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('tu.mail.ongoing.index') ? 'active' : '' }}"
                        href="{{ route('tu.mail.ongoing.index') }}">
                        <i data-feather="archive" class="nav-icon icon-xs me-2"></i> Dalam Proses
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('tu.mail.archived.index') ? 'active' : '' }}"
                        href="{{ route('tu.mail.archived.index') }}">
                        <i data-feather="archive" class="nav-icon icon-xs me-2"></i> Terarsip
                    </a>

                </li>
            @endif
            @if (Auth::user()->hasRole('User'))
                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('user.dashboard.index') ? 'active' : '' }}"
                        href="{{ route('user.dashboard.index') }}">
                        <i data-feather="home" class="nav-icon icon-xs me-2"></i> Dashboard
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('user.setting.account.edit') ? 'active' : '' }}"
                        href="{{ route('user.setting.account.edit') }}">
                        <i data-feather="user" class="nav-icon icon-xs me-2"></i> Pengaturan Akun
                    </a>
                </li> --}}
                <li class="nav-item">
                    <div class="navbar-heading">Seluruh Surat</div>
                </li>
                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('user.mail.in.index') ? 'active' : '' }}"
                        href="{{ route('user.mail.in.index') }}">
                        <i data-feather="mail" class="nav-icon icon-xs me-2"></i> Surat Masuk
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('user.mail.out.index') ? 'active' : '' }}"
                        href="{{ route('user.mail.out.index') }}">
                        <i data-feather="inbox" class="nav-icon icon-xs me-2"></i> Surat Keluar
                    </a>

                </li>

                <li class="nav-item">
                    <div class="navbar-heading">Master Surat</div>
                </li>

                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('user.mail.ongoing.index') ? 'active' : '' }}"
                        href="{{ route('user.mail.ongoing.index') }}">
                        <i data-feather="archive" class="nav-icon icon-xs me-2"></i> Dalam Proses
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('user.mail.archived.index') ? 'active' : '' }}"
                        href="{{ route('user.mail.archived.index') }}">
                        <i data-feather="archive" class="nav-icon icon-xs me-2"></i> Terarsip
                    </a>
                </li>
            @endif
        </ul>

    </div>
</nav>
