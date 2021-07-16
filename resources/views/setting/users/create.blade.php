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
                    <x-page-title page="Tambah Pengguna" icon="bi-house"></x-page-title>
                    <!-- Card -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-6">
                        <div class="card">
                            <div class="tab-content p-4" id="pills-tabContent-basic-forms">
                                <div class="tab-pane tab-example-design fade show active" id="pills-basic-forms-design"
                                    role="tabpanel" aria-labelledby="pills-basic-forms-design-tab">
                                    <form class="row g-3" method="POST"
                                        action="{{ route('admin.setting.user.store') }}">
                                        @csrf
                                        @method('POST')
                                        <div class="col-md-6">
                                            <x-input type="text" label="Nama" name="name" value="{{ old('name') }}"
                                                placeholder="Nama"></x-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-input type="text" label="NIP" name="nip" value="{{ old('nip') }}"
                                                placeholder="NIP"></x-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-select label="Jabatan" name="level_id" value="{{ old('level_id') }}"
                                                :options="$position">

                                            </x-select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <x-select label="Departemen" name="department_id"
                                                value="{{ old('department_id') }}" :options="$department">

                                            </x-select>
                                        </div>
                                        <div class="col-md-6">
                                            <x-input type="text" label="Email" name="email" value="{{ old('email') }}"
                                                placeholder="Email">
                                            </x-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-input type="text" label="Nomor HP" name="phone_number"
                                                value="{{ old('phone_number') }}" placeholder="Nomor HP">
                                            </x-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-input type="text" label="Password" name="password"
                                                value="{{ old('password') }}" placeholder="Password"></x-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-input type="text" label="Konfirmasi Password"
                                                name="password_confirmation"
                                                value="{{ old('password_confirmation') }}"
                                                placeholder="Konfirmasi Password">
                                            </x-input>
                                        </div>

                                        <div class="col-md-6 col-12 d-grid">
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                        </div>

                                        <div class="col-md-6 col-12 d-grid">
                                            <a class="btn btn-secondary"
                                                href="{{ route('admin.setting.user.index') }}">Batalkan</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
