<!-- Sidebar -->
<nav class="navbar-vertical navbar">
    <div class="nav-scroller">

        <!-- Brand logo -->
        <a class="navbar-brand" href="/">
            <h2 class="text-light text-center fw-bold">UICI</h2>
            {{-- <img src="@@webRoot/assets/images/brand/logo/logo.svg" alt="" /> --}}
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
                        <i data-feather="settings" class="nav-icon icon-xs me-2"></i> Pengaturan Akun
                    </a>
                </li>

                <!-- Nav item -->
                <li class="nav-item">
                    <div class="navbar-heading">Akses Seluruh Surat</div>
                </li>

                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('admin.mail.ongoing.index') ? 'active' : '' }}"
                        href="{{ route('admin.mail.ongoing.index') }}">
                        <i data-feather="rotate-cw" class="nav-icon icon-xs me-2"></i> Sedang Berlangsung
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
                        <i data-feather="users" class="nav-icon icon-xs me-2"></i> Data Pengguna
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('admin.setting.level.index') ? 'active' : '' }}"
                        href="{{ route('admin.setting.level.index') }}">
                        <i data-feather="award" class="nav-icon icon-xs me-2"></i> Data Jabatan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('admin.setting.department.index') ? 'active' : '' }}"
                        href="{{ route('admin.setting.department.index') }}">
                        <i data-feather="bookmark" class="nav-icon icon-xs me-2"></i> Data Bid/SubBag
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('admin.setting.mail.attribute.index') ? 'active' : '' }}"
                        href="{{ route('admin.setting.mail.attribute.index') }}">
                        <i data-feather="file-text" class="nav-icon icon-xs me-2"></i> Data Atribut Surat
                    </a>
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
                    <a class="nav-link has-arrow {{ Request::routeIs('tu.mail.in.index') ? 'active' : '' }}"
                        href="{{ route('tu.mail.in.index') }}">
                        <i data-feather="log-in" class="nav-icon icon-xs me-2"></i> Surat Masuk
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('tu.mail.out.index') ? 'active' : '' }}"
                        href="{{ route('tu.mail.out.index') }}">
                        <i data-feather="log-out" class="nav-icon icon-xs me-2"></i> Surat Keluar
                    </a>

                </li>

                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('tu.mail.out.index') ? 'active' : '' }}"
                        href="{{ route('tu.mail.out.index') }}">
                        <i data-feather="repeat" class="nav-icon icon-xs me-2"></i> Surat Keluar
                    </a>

                </li>

                <!-- Nav item -->
                <li class="nav-item">
                    <div class="navbar-heading">Master Surat</div>
                </li>

                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('tu.mail.ongoing.index') ? 'active' : '' }}"
                        href="{{ route('tu.mail.ongoing.index') }}">
                        <i data-feather="rotate-cw" class="nav-icon icon-xs me-2"></i> Sedang Berlangsung
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
                        <i data-feather="settings" class="nav-icon icon-xs me-2"></i> Pengaturan Akun
                    </a>
                </li> --}}
                <li class="nav-item">
                    <div class="navbar-heading">Seluruh Surat</div>
                </li>

                <li class="nav-item">
                    <div class="nav-link text-center">
                        <a class="btn btn-block btn-primary" href="{{ route('user.mail.out.create') }}">
                            <i data-feather="plus" class="nav-icon icon-xs me-2"></i>
                            Tambah Surat
                        </a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('user.mail.in.index') ? 'active' : '' }}"
                        href="{{ route('user.mail.in.index') }}">
                        <i data-feather="log-in" class="nav-icon icon-xs me-2"></i> Surat Masuk
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('user.mail.out.index') ? 'active' : '' }}"
                        href="{{ route('user.mail.out.index') }}">
                        <i data-feather="log-out" class="nav-icon icon-xs me-2"></i> Surat Keluar
                    </a>

                </li>

                <li class="nav-item">
                    <a class="nav-link has-arrow {{ Request::routeIs('tu.mail.out.index') ? 'active' : '' }}"
                        href="{{ route('tu.mail.out.index') }}">
                        <i data-feather="repeat" class="nav-icon icon-xs me-2"></i> Surat Keluar
                    </a>

                </li>

                @if (Auth::user()->hasAllMailAccess())
                    <li class="nav-item">
                        <div class="navbar-heading">Master Surat</div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link has-arrow {{ Request::routeIs('user.mail.ongoing.index') ? 'active' : '' }}"
                            href="{{ route('user.mail.ongoing.index') }}">
                            <i data-feather="rotate-cw" class="nav-icon icon-xs me-2"></i> Sedang Berlangsung
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link has-arrow {{ Request::routeIs('user.mail.archived.index') ? 'active' : '' }}"
                            href="{{ route('user.mail.archived.index') }}">
                            <i data-feather="archive" class="nav-icon icon-xs me-2"></i> Terarsip
                        </a>
                    </li>
                @endif
            @endif
        </ul>

    </div>
</nav>
