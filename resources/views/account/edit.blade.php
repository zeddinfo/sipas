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
                        <h2>Edit Akun</h2>
                    </div>
                    <!-- Card -->
                    <div class="card">
                        <div class="tab-content p-4" id="pills-tabContent-basic-forms">
                            <div class="tab-pane tab-example-design fade show active" id="pills-basic-forms-design"
                                role="tabpanel" aria-labelledby="pills-basic-forms-design-tab">
                                <form class="row g-3" method="POST" action="{{ route('admin.setting.user.store') }}">
                                    @csrf
                                    @method('POST')
                                    <div class="col-md-6">
                                        <x-input label="Nama" value="{{ $user->name }}" name="name"
                                            placeholder="Nama">
                                        </x-input>
                                    </div>

                                    <div class="col-md-6">
                                        <x-input label="NIP" value="{{ $user->nip }}" name="nip" placeholder="NIP">
                                        </x-input>
                                    </div>

                                    <div class="col-md-6">
                                        <x-input label="Email" value="{{ $user->email }}" name="email"
                                            placeholder="Email">
                                        </x-input>
                                    </div>

                                    <div class="col-md-6">
                                        <x-input label="Nomor HP" :value="$user->phone_number" name="phone_number"
                                            placeholder="Nomor HP"></x-input>
                                    </div>

                                    <div class="col-md-6">
                                        <x-input label="Password" name="password" placeholder="Password"></x-input>
                                    </div>

                                    <div class="col-md-6">
                                        <x-input label="Konfirmasi Password" name="password_confirmation"
                                            placeholder="Konfirmasi Password"></x-input>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Update Profil</button>
                                        <button class="btn btn-secondary" type="submit">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
