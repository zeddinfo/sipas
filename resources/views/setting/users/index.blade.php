<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>
    <div class="container-fluid px-6 py-4">
        <div class="py-6">
            <!-- Responsive tables -->
            <div cass="row mb-6">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div id="responsive-tables" class="mb-4">
                        <h2>{{ $page }}</h2>
                    </div>
                    <!-- Card -->
                    <div class="card">
                        <!-- Content -->
                        <div class="tab-content p-4"
                             id="pills-tabContent-responsive-tables">
                            <div class="tab-pane tab-example-design fade show active"
                                 id="pills-responsive-tables-design"
                                 role="tabpanel"
                                 aria-labelledby="pills-responsive-tables-design-tab">
                                <div class="">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Pengguna</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col">Akun</th>
                                            <th scope="col">Kontak</th>
                                            <th class="text-center" scope="col">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($users as $user)
                                            <tr>
                                                <td>{{ Str::limit($user->name, 40) }}</td>
                                                <td>{{ Str::limit($user->level->name, 40) }}</td>
                                                <td>{{ Str::limit($user->email, 40) }}</td>
                                                <td>{{ Str::limit($user->phone_number, 40) }}</td>
                                                <td>
                                                    <div class="tab-pane tab-example-design fade show active" id="pills-button-icon-fixed-design" role="tabpanel" aria-labelledby="pills-button-icon-fixed-design-tab">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <a class="btn btn-warning text-center" href="{{ route('admin.setting.user.edit', $user->id) }}">Ubah</a>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <x-button action="{{ route('admin.setting.user.destroy', $user->id) }}" method="delete" class="btn btn-danger">
                                                                    Hapus
                                                                </x-button>
                                                            </div>
                                                        </div>

                                                            {{-- <a class="btn btn-danger text-center" href="{{ route('admin.setting.user.destroy', $user->id) }}"><i data-feather="delete" class="nav-icon icon-xs me-2"></i></a> --}}
                                                    </div>
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
    </div>
</x-app-layout>