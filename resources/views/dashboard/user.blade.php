<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <!-- Container fluid -->
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6 pb-5">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-2 mb-lg-0">
                            <h3 class="mb-0 fw-bold text-white">Dashboard</h3>
                        </div>
                        <div>
                            <a href="#" class="btn btn-white">Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-12 col-12 mt-6">
                <!-- card -->
                <div class="card rounded-3">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center
                    mb-3">
                            <div>
                                <h4 class="mb-0">Total Surat</h4>
                            </div>
                            <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-1">
                                <i class="bi bi-envelope-open fs-4"></i>
                            </div>
                        </div>
                        <!-- project number -->
                        <div>
                            <h1 class="fw-bold">{{ $stat['mails_count'] }}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-12 col-12 mt-6">
                <!-- card -->
                <a href="{{ route('user.mail.in.index') }}">
                    <div class="card rounded-3">
                        <!-- card body -->
                        <div class="card-body">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center
                    mb-3">
                                <div>
                                    <h4 class="mb-0">Total Surat Masuk</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-1">
                                    <i class="bi bi-box-arrow-in-left fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold">{{ $stat['mails_in_count'] }}</h1>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-12 col-12 mt-6">
                <a href="{{ route('user.mail.out.index') }}">
                    <!-- card -->
                    <div class="card rounded-3">
                        <!-- card body -->
                        <div class="card-body">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center
                    mb-3">
                                <div>
                                    <h4 class="mb-0">Total Surat Keluar</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-1">
                                    <i class="bi bi-box-arrow-left fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold">{{ $stat['mails_out_count'] }}</h1>
                            </div>
                        </div>
                    </div>
                </a>
            </div>


        </div>
    </div>
</x-app-layout>
