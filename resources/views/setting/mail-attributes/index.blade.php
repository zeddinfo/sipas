<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="py-6">
            <!-- Responsive tables -->
            <div cass="row mb-6">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <x-page-title page="{{ $page }}" icon="bi-house"></x-page-title>
                    <!-- Card -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-6">
                        <!-- Card -->
                        <div class="card">
                            <!-- Content -->
                            <div class="tab-content p-4" id="pills-tabContent-responsive-tables">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a class="btn btn-primary"
                                        href="{{ route('admin.setting.mail.attribute.create') }}">
                                        Tambah Atribut Surat
                                    </a>
                                </div>
                                <div class="tab-pane tab-example-design fade show active mt-3"
                                    id="pills-responsive-tables-design" role="tabpanel"
                                    aria-labelledby="pills-responsive-tables-design-tab">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" scope="col">No</th>
                                                    <th scope="col">Tipe Atribut</th>
                                                    <th scope="col">Nama Atribut</th>
                                                    <th scope="col">Kode</th>
                                                    <th class="text-center" scope="col">Warna</th>
                                                    <th class="text-center" scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($mail_attributes as $key => $mail_attribute)
                                                    <tr>
                                                        <td class="text-center">{{ $key + 1 }}</td>
                                                        <td>{{ Str::limit($mail_attribute->type, 40) }}</td>
                                                        <td class="fw-bold">
                                                            {{ Str::limit($mail_attribute->name, 40) }}</td>
                                                        <td>{{ Str::limit($mail_attribute->code, 40) }}</td>

                                                        <td class="text-center">
                                                            <button type="button" class="btn"
                                                                style="background-color: {{ $mail_attribute->color }}">
                                                                <div class="text-white">
                                                                    {{ $mail_attribute->color }}
                                                                </div>
                                                            </button>
                                                        </td>

                                                        <td class="text-center align-middle">
                                                            <a class="btn btn-warning text-center"
                                                                href="{{ route('admin.setting.mail.attribute.edit', $mail_attribute->id) }}">
                                                                <i class="bi bi-pencil fs-4"></i>
                                                            </a>

                                                            <x-button
                                                                action="{{ route('admin.setting.mail.attribute.destroy', $mail_attribute->id) }}"
                                                                method="DELETE" class="btn btn-danger mt-2 mt-md-0">
                                                                <i class="bi bi-trash fs-4"></i>
                                                            </x-button>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <h4>Tidak ada surat.</h4>
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
    </div>
</x-app-layout>
