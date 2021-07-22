<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <!-- Responsive tables -->
        <div cass="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-2 mb-lg-0">
                            <h3 class="mb-0 fw-bold text-white">{{ $page }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-6">
                <div class="card">
                    <!-- Content -->
                    <div class="tab-content p-4" id="pills-tabContent-responsive-tables">
                        <div class="tab-pane tab-example-design fade show active" id="pills-responsive-tables-design"
                            role="tabpanel" aria-labelledby="pills-responsive-tables-design-tab">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a class="btn btn-primary" href="{{ route('admin.setting.level.create') }}">Tambah
                                    Jabatan</a>
                            </div>
                            <div class="table-responsive mt-5">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col">No</th>
                                            <th scope="col">Nama Jabatan</th>
                                            <th scope="col">Privelege Akses</th>
                                            <th class="text-center" scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($levels as $key => $level)
                                            <tr>
                                                <td class="text-center align-middle">{{ $key + 1 }}</td>
                                                <td class="fw-bold align-middle">{{ Str::limit($level->name, 40) }}
                                                </td>
                                                <td class="fw-bold align-middle">
                                                    {!! $level->sameLevel != null ? $level->sameLevel->name : '' !!}
                                                </td>

                                                <td class="text-center align-middle">
                                                    <a class="btn btn-warning text-center"
                                                        href="{{ route('admin.setting.level.edit', $level->id) }}">
                                                        <i class="bi bi-pencil fs-4"></i>
                                                    </a>

                                                    <x-button
                                                        action="{{ route('admin.setting.level.destroy', $level->id) }}"
                                                        method="delete" class="btn btn-danger mt-2 mt-md-0">
                                                        <i class="bi bi-trash fs-4"></i>
                                                    </x-button>
                                                </td>
                                            </tr>
                                        @empty
                                            <h4>Tidak ada data.</h4>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
