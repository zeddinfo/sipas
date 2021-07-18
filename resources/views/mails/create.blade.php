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
                    <x-page-title page="Buat Surat" icon="bi-house"></x-page-title>
                    <!-- Card -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-6">
                        <!-- Card -->
                        <div class="card">
                        <div class="tab-content p-4" id="pills-tabContent-basic-forms">
                            <div class="tab-pane tab-example-design fade show active" id="pills-basic-forms-design" role="tabpanel" aria-labelledby="pills-basic-forms-design-tab">
                                <form class="row g-3" method="POST" action="{{ route('tu.mail.in.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="col-md-6">
                                        <x-input type="text" label="Judul Surat" name="title" placeholder="Judul Surat"></x-input>
                                    </div>
                                    <div class="col-md-6">
                                        <x-input type="text" label="Instansi" name="instance" placeholder="Instansi"></x-input>
                                    </div>
                                    <div class="col-md-6">
                                        <x-input type="text" label="Kode Surat" name="code" placeholder="Kode Surat"></x-input>
                                    </div>
                                    <div class="col-md-6">
                                        <x-input type="text" label="Kode Arsip" name="directory_code" placeholder="Kode Arsip"></x-input>
                                    </div>
                                    <div class="col-md-3">
                                        <x-select label="Sifat Surat" name="mail_attributes[]" :options="$sifat">

                                        </x-select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <x-select label="Tipe Surat" name="mail_attributes[]" :options="$tipe">

                                        </x-select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <x-select label="Prioritas Surat" name="mail_attributes[]" :options="$prioritas">

                                        </x-select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <x-select label="Folder Surat" name="mail_attributes[]" :options="$folder">

                                        </x-select>
                                    </div>
                                    <div class="col-md-6">
                                        <x-input type="date" label="Waktu Surat" name="mail_created_at"></x-input>
                                    </div>
                                    <div class="col-md-6">
                                        <x-input type="file" label="Upload" name="file" placeholder="Upload File"></x-input>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-success" type="submit">Buat Surat</button>
                                        <button class="btn btn-secondary" type="reset">Batal</button>
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
    @section('script')
    @include('sweetalert::alert')
@endsection
</x-app-layout>