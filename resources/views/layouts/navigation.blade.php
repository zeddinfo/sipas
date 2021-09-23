<div class="header @@classList">
    <!-- navbar -->
    <nav class="navbar-classic navbar navbar-expand-lg">
        <a id="nav-toggle" href="#"><i data-feather="menu" class="nav-icon me-2 icon-xs"></i></a>
        <div class="ms-lg-3 d-none d-md-none d-lg-block">
            <!-- Form -->
            <form class="d-flex align-items-center">
                <input type="search" class="form-control" placeholder="Search" />
            </form>
        </div>
        <!--Navbar nav -->
        <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">
            <li class="dropdown stopevent">
                <a class="btn btn-light btn-icon rounded-circle indicator
          indicator-primary text-muted" href="#" role="button" id="dropdownNotification" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="icon-xs" data-feather="bell"></i>
                </a>

                {{-- <div class="bg-danger ml-n3 spinner-grow spinner-grow-sm mb-n3" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div> --}}

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end" aria-labelledby="dropdownNotification">
                    <div class="">
                        <div class="border-bottom px-3 pt-2 pb-3 d-flex
              justify-content-between align-items-center">
                            <p class="mb-0 text-dark fw-medium fs-4">Notifications</p>
                            <a href="#" class="text-muted">
                                <span>
                                    <i class="me-1 icon-xxs" data-feather="settings"></i>
                                </span>
                            </a>
                        </div>
                        <!-- List group -->
                        <ul class="list-group list-group-flush notification-list-scroll">
                            <!-- List group item -->
                            <li class="list-group-item bg-light">


                                <a href="#" class="text-muted">
                                    <h5 class="fw-bold mb-1">Rishi Chopra</h5>
                                    <p class="mb-0">
                                        Mauris blandit erat id nunc blandit, ac eleifend dolor pretium.
                                    </p>
                                </a>



                            </li>
                            <!-- List group item -->
                            <li class="list-group-item">


                                <a href="#" class="text-muted">
                                    <h5 class="fw-bold mb-1">Neha Kannned</h5>
                                    <p class="mb-0">
                                        Proin at elit vel est condimentum elementum id in ante. Maecenas et sapien
                                        metus.
                                    </p>
                                </a>



                            </li>
                            <!-- List group item -->
                            <li class="list-group-item">


                                <a href="#" class="text-muted">
                                    <h5 class="fw-bold mb-1">Nirmala Chauhan</h5>
                                    <p class="mb-0">
                                        Morbi maximus urna lobortis elit sollicitudin sollicitudieget elit vel pretium.
                                    </p>
                                </a>



                            </li>
                            <!-- List group item -->
                            <li class="list-group-item">


                                <a href="#" class="text-muted">
                                    <h5 class="fw-bold mb-1">Sina Ray</h5>
                                    <p class="mb-0">
                                        Sed aliquam augue sit amet mauris volutpat hendrerit sed nunc eu diam.
                                    </p>
                                </a>



                            </li>
                        </ul>
                        <div class="border-top px-3 py-2 text-center">
                            <a href="#" class="text-inherit fw-semi-bold">
                                View all Notifications
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <!-- List -->
            <li class="dropdown ms-2">
                <a class="rounded-circle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md avatar-indicators avatar-online rounded-circle bg-warning">
                        <h4 class="text-center mt-2">
                            @php
                                $name = Auth::user()->name;
                                $words = explode(' ', $name);
                                $acronym = '';
                                
                                for ($i = 0; $i < str_word_count($name) && $i < 2; $i++) {
                                    $acronym .= strtoupper($words[$i][0]);
                                }
                                
                                echo $acronym;
                            @endphp
                        </h4>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                    <div class="px-4 pb-0 pt-2">
                        <div class="lh-1 ">
                            <h5 class="mb-1">{{ Str::limit(Auth::user()->name, 20) }}</h5>
                            <a href="#"
                                class="text-inherit fs-6">{{ Auth::user()->level->name . Auth::user()->department?->name }}</a>
                        </div>
                        <div class=" dropdown-divider mt-3 mb-2"></div>
                    </div>

                    <ul class="list-unstyled">
                        <li>
                            <a class="dropdown-item disabled" href="#">
                                <i class="me-2 icon-xxs dropdown-item-icon" data-feather="activity"></i>Riwayat
                                Aktivitas
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ route(RouteHelper::get('setting.account.edit')) }}">
                                <i class="me-2 icon-xxs dropdown-item-icon" data-feather="settings"></i>Pengaturan Akun
                            </a>
                        </li>

                        <li>
                            <x-button action="{{ route('logout') }}" class="dropdown-item">
                                <i class="me-2 icon-xxs dropdown-item-icon" data-feather="power"></i>Sign Out
                            </x-button>
                        </li>
                    </ul>

                </div>
            </li>
        </ul>
    </nav>
</div>
