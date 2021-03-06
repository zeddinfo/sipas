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
                <x-page-title page="Ubah Atribut Surat" icon="bi-file-earmark-medical"></x-page-title>
                <!-- Card -->
                <div class="card mt-6 mb-6">
                    <div class="tab-content p-4" id="pills-tabContent-basic-forms">
                        <div class="tab-pane tab-example-design fade show active" id="pills-basic-forms-design"
                            role="tabpanel" aria-labelledby="pills-basic-forms-design-tab">
                            <form class="row g-3" method="POST"
                                action="{{ route('admin.setting.mail.attribute.update', $mail_attribute->id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="col-md-3">
                                    <x-select label="Tipe Atribut Surat" class="form-control"
                                        :value="isset($mail_attribute) ? $mail_attribute->type : ''" field="type"
                                        name="type" :options="$mail_attribute_types">
                                    </x-select>
                                </div>

                                <div class="col-md-3">
                                    <x-input type="text" label="Nama Atribut Surat" name="name"
                                        value="{{ $mail_attribute->name }}" placeholder="Nama Atribut Surat">
                                    </x-input>
                                </div>

                                <div class="col-md-3">
                                    <x-input type="text" label="Kode Atribut Surat" name="code"
                                        value="{{ $mail_attribute->code }}" placeholder="Kode Atribut Surat">
                                    </x-input>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <x-input-color label="Warna Label" name="color"
                                        value="{{ $mail_attribute->color }}" placeholder="Warna Label">
                                    </x-input-color>
                                </div>

                                <div class="col-12 d-grid d-md-block">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                    <a class="btn btn-secondary mt-2 mt-md-0"
                                        href="{{ route('admin.setting.mail.attribute.index') }}">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
