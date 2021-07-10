<!-- Sidebar -->
<nav class="navbar-vertical navbar">
    <div class="nav-scroller">

        <!-- Brand logo -->
        <a class="navbar-brand" href="@@webRoot/index.html">
            <img src="@@webRoot/assets/images/brand/logo/logo.svg" alt="" />
        </a>
        <!-- Admin nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link has-arrow {{ Request::is(route('dashboard')) ? 'active' : '' }}"
                   href="{{ route('dashboard') }}">
                    <i data-feather="home" class="nav-icon icon-xs me-2"></i>  Dashboard
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link has-arrow {{ Request::is(route('tu.mail.in.index')) ? 'active' : '' }}"
                   href="{{ route('tu.mail.in.index') }}">
                    <i data-feather="mail" class="nav-icon icon-xs me-2"></i>  Surat Masuk
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link has-arrow @@if (context.page ===  'dashboard') { active }" href="/">
                    <i data-feather="inbox" class="nav-icon icon-xs me-2"></i>  Surat Keluar
                </a>

            </li>


            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Seluruh Surat</div>
            </li>


            <li class="nav-item">
                <a class="nav-link has-arrow @@if (context.page ===  'dashboard') { active }" href="/">
                    <i data-feather="archive" class="nav-icon icon-xs me-2"></i>  Surat Masuk
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link has-arrow @@if (context.page ===  'dashboard') { active }" href="/">
                    <i data-feather="archive" class="nav-icon icon-xs me-2"></i>  Surat Keluar
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link has-arrow {{ Request::is(route('admin.mail.archived.index')) ? 'active' : '' }}"
                   href="{{ route('admin.mail.archived.index') }}">
                    <i data-feather="archive" class="nav-icon icon-xs me-2"></i>  Arsip Surat
                </a>

            </li>


            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Super Admin Menu</div>
            </li>
            <li class="nav-item">
                <a class="nav-link has-arrow @@if (context.page ===  'dashboard') { active }" href="/">
                    <i data-feather="users" class="nav-icon icon-xs me-2"></i>  Lihat Pengguna
                </a>

            </li>

            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow @@if (context.page_group !== 'utilities') { collapsed }" href="#!" data-bs-toggle="collapse" data-bs-target="#navUtilities" aria-expanded="false" aria-controls="navUtilities">
                    <i data-feather="user-check" class="nav-icon icon-xs me-2" >
                    </i> Pengaturan Jabatan
                </a>
                <div id="navUtilities" class="collapse @@if (context.page_group === 'utilities') { show }" data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link @@if (context.page === 'typography') { active }" href="@@webRoot/components/typography.html" aria-expanded="false">
                                Jabatan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @@if (context.page === 'borders') { active }" href="@@webRoot/components/borders.html" aria-expanded="false">
                                Unit Kerja
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @@if (context.page === 'colors') { active }" href="@@webRoot/components/colors.html" aria-expanded="false">
                                Departemen
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow @@if (context.page_group !== 'utilities') { collapsed }" href="#!" data-bs-toggle="collapse" data-bs-target="#navUtilities" aria-expanded="false" aria-controls="navUtilities">
                    <i data-feather="settings" class="nav-icon icon-xs me-2" >
                    </i> Pengaturan Surat
                </a>
                <div id="navUtilities" class="collapse @@if (context.page_group === 'utilities') { show }" data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link @@if (context.page === 'typography') { active }" href="@@webRoot/components/typography.html" aria-expanded="false">
                                Jenis Surat
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @@if (context.page === 'borders') { active }" href="@@webRoot/components/borders.html" aria-expanded="false">
                                Sifat Surat
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @@if (context.page === 'colors') { active }" href="@@webRoot/components/colors.html" aria-expanded="false">
                                Prioritas Surat
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @@if (context.page === 'borders') { active }" href="@@webRoot/components/borders.html" aria-expanded="false">
                                Folder Arsip Surat
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @@if (context.page === 'colors') { active }" href="@@webRoot/components/colors.html" aria-expanded="false">
                                Tipe Koreksi Surat
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>

    </div>
</nav>
