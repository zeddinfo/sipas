<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row">
            <x-page-title page="Detail Surat" icon="bi-house"></x-page-title>
            <!-- Detail Surat -->
            <div class="col-xl-6 col-lg-6 col-md-12 col-12 mt-6">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- card title -->
                        <h4 class="card-title mb-4">Informasi Surat</h4>
                        <!-- row -->
                        <div class="row">
                            @forelse($mails as $mail)
                                <div class="col-6 mb-5">
                                    <h6 class="text-uppercase fs-5 ls-1">Nomor Surat </h6>
                                    <p class="mb-0">{{ $mail->code }}</p>
                                </div>
                                <div class="col-6 mb-5">
                                    <h6 class="text-uppercase fs-5 ls-2">Judul Surat </h6>
                                    <p class="mb-0">{{ $mail->title }}</p>
                                </div>
                                <div class="col-6 mb-5">
                                    <h6 class="text-uppercase fs-5 ls-2">Instansi</h6>
                                    <p class="mb-0">{{ $mail->instance }}</p>
                                </div>
                                <div class="col-6 mb-5">
                                    <h6 class="text-uppercase fs-5 ls-2">Jenis Surat</h6>
                                    <x-badge name="PERMOHONAN" color="#1bcfb4"></x-badge>
                                </div>
                                <div class="col-6 mb-5">
                                    <h6 class="text-uppercase fs-5 ls-2">Sifat Surat</h6>
                                    <x-badge name="Umum" color="#fe5678"></x-badge>
                                </div>
                                <div class="col-6 mb-5">
                                    <h6 class="text-uppercase fs-5 ls-2">Prioritas Surat</h6>
                                    <x-badge name="Segera" color="#ffd500"></x-badge>
                                </div>
                            @empty
                                <h4>Tidak ada surat.</h4>
                            @endforelse
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-success" type="button">Teruskan</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Riwayat Surat -->
            <div class="col-xl-6 col-lg-6 col-md-12 col-12 mt-6">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- card title -->
                        <h4 class="card-title mb-4">Riwayat Surat</h4>
                        <div class="d-md-flex justify-content-between
                  align-items-center mb-4">
                            <div class="d-flex align-items-center">
                                <!-- text -->
                                <div class="ms-3 ">
                                    <h5 class="mb-1"><a href="#" class="text-inherit">Slack Figma Design
                                            UI</a></h5>
                                    <p class="mb-0 fs-5 text-muted">Project description and details about...</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center ms-10 ms-md-0 mt-3">
                                <div>
                                    <!-- dropdown -->
                                    <div class="dropdown dropstart">
                                        <a href="#" class="text-muted text-primary-hover" id="dropdownprojectOne" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i data-feather="more-vertical" class="icon-xxs"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownprojectOne">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else
                                                here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

</x-app-layout>