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
                <x-page-title page="{{ $title }}" icon="bi-plus"></x-page-title>
                <!-- Card -->
                <div class="card mt-6 mb-6">
                    <div class="tab-content p-4" id="pills-tabContent-basic-forms">
                        <div class="tab-pane tab-example-design fade show active" id="pills-basic-forms-design"
                            role="tabpanel" aria-labelledby="pills-basic-forms-design-tab">
                            <form class="row g-3" method="POST"
                                action="{{ Auth::user()->hasRole('User') ? route('user.mail.out.store') : route('tu.mail.in.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')

                                <div class="col-md-6">
                                    <x-input type="text" label="Perihal Surat" name="title" value="{{ old('title') }}"
                                        placeholder="Perihal Surat"></x-input>
                                </div>

                                <div class="col-md-6">
                                    <x-input type="text"
                                        label="{{ $mail_type == 'IN' ? 'Asal Surat' : 'Tujuan Surat' }}"
                                        name="instance" value="{{ old('instance') }}"
                                        placeholder="{{ $mail_type == 'IN' ? 'Asal Surat' : 'Tujuan Surat' }}">
                                    </x-input>
                                </div>

                                @if ($mail_type == 'IN')
                                    <div class="col-md-6">
                                        <x-input type="text" label="Nomor Surat" name="code" value="{{ old('code') }}"
                                            placeholder="Nomor Surat"></x-input>
                                    </div>
                                @endif

                                <div class="col-md-6">
                                    <x-input type="file" label="Upload File Surat" name="file"
                                        placeholder="Upload File Surat">
                                    </x-input>
                                </div>

                                @foreach ($mail_attributes as $key => $mail_attribute)
                                    <div class="col-md-{{ 12 / count($mail_attributes) }}">
                                        <x-select label="{{ $mail_attribute->first()->type }} Surat"
                                            name="mail_attributes[]" value="{{ old('mail_attributes')[$key] ?? '' }}"
                                            :options="$mail_attribute" errorName="mail_attributes.{{ $key }}">
                                        </x-select>
                                    </div>
                                @endforeach

                                <div class="col-md-6">
                                    <x-input type="date" label="Tanggal Surat" name="mail_created_at"></x-input>
                                </div>

                                @if ($mail_type == 'IN')
                                    <div class="col-md-6">
                                        <x-input type="date" label="Tanggal Surat Diterima (Kosongkan bila hari ini)"
                                            name="mail_received_at">
                                        </x-input>
                                    </div>
                                @endif

                                <div class="col-12 d-grid d-md-block">
                                    <button class="btn btn-primary" type="submit">Tambah</button>
                                    <a href="/" class="btn btn-secondary mt-2 mt-md-0" type="reset">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
