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
                        <div class="tab-content p-4" id="pills-tabContent-responsive-tables">
                            <div class="tab-pane tab-example-design fade show active"
                                id="pills-responsive-tables-design" role="tabpanel"
                                aria-labelledby="pills-responsive-tables-design-tab">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Pengguna</th>
                                                <th class="text-center" scope="col">Jabatan</th>
                                                <th class="text-center" scope="col">Email</th>
                                                <th class="text-center" scope="col">Nomor HP</th>
                                                <th class="text-center" scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($users as $key => $user)
                                            <tr>
                                                <td class="text-center align-middle">{{ ($key+1) }}</td>
                                                <td class="fw-bold align-middle">{{ Str::limit($user->name, 40) }}</td>
                                                <td class="align-middle"><nav class="fw-bolder">
                                                    {!! $user->level->name ."</nav><br>". $user->department?->name !!}

                                                </td>
                                                <td class="align-middle">{{ Str::limit($user->email, 40) }}</td>
                                                <td class="text-center align-middle">{{ Str::limit($user->phone_number, 40) }}</td>
                                                <td class="text-center align-middle">
                                                        <a class="btn btn-warning text-center"
                                                            href="{{ route('admin.setting.user.edit', $user->id) }}">
                                                            <i class="bi bi-envelope-open fs-4"></i>
                                                        </a>

                                                        <x-button
                                                        action="{{ route('admin.setting.user.destroy', $user->id) }}"
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
    </div>
</x-app-layout>
