<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">

        <!-- Responsive tables -->
        <div cass="row mb-6">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <x-page-title page="Pengaturan Akun" icon="bi-gear"></x-page-title>
                <!-- Card -->
                <div class="card mt-6 mb-6">
                    <div class="tab-content p-4" id="pills-tabContent-basic-forms">
                        <div class="tab-pane tab-example-design fade show active" id="pills-basic-forms-design"
                            role="tabpanel" aria-labelledby="pills-basic-forms-design-tab">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="row g-3" method="POST"
                                action="{{ route(RouteHelper::get('setting.account.update')) }}">
                                @csrf
                                @method('PATCH')

                                <div class="col-md-6">
                                    <x-input label="Nama" value="{{ $user->name }}" name="name" placeholder="Nama">
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
                                    <x-input type="password" label="Password" name="password" placeholder="Password">
                                    </x-input>
                                </div>

                                <div class="col-md-6">
                                    <x-input label="Konfirmasi Password" name="password_confirmation"
                                        placeholder="Konfirmasi Password"></x-input>
                                </div>

                                <div class="col-12 d-grid d-md-block">
                                    <button class="btn btn-primary" type="submit">Ubah</button>
                                    <a href="/" class="btn btn-secondary mt-2 mt-md-0" type="submit">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
