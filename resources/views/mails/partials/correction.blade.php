<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="py-6">
            <div class="row mb-6">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <x-page-title page="Koreksi Surat" icon="bi-house"></x-page-title>
                    <!-- Revision Section -->
                    @if ($correction != null)
                        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-6">
                            <div class="card">
                                <div class="tab-content p-4" id="pills-tabContent-basic-forms">
                                    <div class="tab-pane tab-example-design fade show active"
                                        id="pills-basic-forms-design" role="tabpanel"
                                        aria-labelledby="pills-basic-forms-design-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">Catatan Revisi</label>
                                                <p>{{ $correction->note }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">File Revisi</label>
                                                <p>{{ $correction->note }}</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-6">
                        <!-- card -->
                        <div class="card">
                            <div class="tab-content p-4" id="pills-tabContent-basic-forms">
                                <div class="tab-pane tab-example-design fade show active" id="pills-basic-forms-design"
                                    role="tabpanel" aria-labelledby="pills-basic-forms-design-tab">
                                    <form class="row g-3" method="POST"
                                        action="{{ route('user.mail.out.revision.store', ['mail' => $mail->id]) }}">
                                        @csrf
                                        @method('POST')
                                        <div class="col-md-6">
                                            <x-input type="text" label="Judul Surat" value="{{ $mail->title }}"
                                                name="title" placeholder="Judul Surat"></x-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-input type="text" label="Instansi" value="{{ $mail->instance }}"
                                                name="instance" placeholder="Instansi"></x-input>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <x-select label="Tipe Surat" name="tipe"
                                                value="{{ isset($mail) && $mail->attributes ? $mail->attributes[0]->id : '' }}"
                                                :options="$tipe">

                                            </x-select>
                                        </div>
                                        <div class="col-md-3">
                                            <x-select label="Sifat Surat" name="sifat"
                                                value="{{ isset($mail) && $mail->attributes ? $mail->attributes[1]->id : '' }}"
                                                :options="$sifat">

                                            </x-select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <x-select label="Prioritas Surat" name="tipe"
                                                value="{{ isset($mail) && $mail->attributes ? $mail->attributes[2]->id : '' }}"
                                                :options="$prioritas">

                                            </x-select>
                                        </div>
                                        {{-- <div class="form-group col-md-3">
                                        <x-select label="Folder Surat" name="folder" value="{{isset($mail) && $mail->attributes ? $mail->attributes[3]->id : ''}}" :options="$folder">
    
                                        </x-select>
                                    </div> --}}
                                        <div class="col-md-6">
                                            <x-input type="date" label="Waktu Surat"
                                                value="{{ Carbon\Carbon::parse($mail->mail_created_at)->format('Y-m-d') }}"
                                                name="date"></x-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-input type="file" label="Upload" name="file" placeholder="Upload File">
                                            </x-input>
                                        </div>

                                </div>

                                <div class="col-12 mt-5">
                                    <button class="btn btn-warning" type="submit">Koreksi Surat</button>
                                    <a href="{{ route(RouteHelper::get('mail.out.index')) }}"
                                        class="btn btn-secondary" type="reset">Batal</a>
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
