<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row mb-6">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <x-page-title page="{{ $title }} Surat" icon="bi-house"></x-page-title>
                <!-- Revision Section -->
                @if ($correction != null)
                    <div class="card mt-6 mb-6">
                        <div class="tab-content p-4" id="pills-tabContent-basic-forms">
                            <div class="tab-pane tab-example-design fade show active" id="pills-basic-forms-design"
                                role="tabpanel" aria-labelledby="pills-basic-forms-design-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Catatan Revisi</label>
                                        <p>{{ $correction->note }}</p>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">File Revisi</label>
                                        <br>
                                        <a href="{{ route('user.mail.out.revision.show', $correction) }}"
                                            target="_blank" class="btn btn-warning">Lihat File Revisi</a>
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
                            <form class="row g-3" method="POST" action="{{ route('user.mail.out.update', $mail) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="col-md-6">
                                    <x-input type="text" label="Judul Surat" value="{{ $mail->title }}" name="title"
                                        placeholder="Judul Surat"></x-input>
                                </div>
                                <div class="col-md-6">
                                    <x-input type="text" label="Instansi" value="{{ $mail->instance }}"
                                        name="instance" placeholder="Instansi"></x-input>
                                </div>

                                @foreach ($mail_attributes as $key => $mail_attribute)
                                    <div class="col-md-{{ 12 / count($mail_attributes) }}">
                                        <x-select label="{{ $mail_attribute->first()->type }} Surat"
                                            name="mail_attributes[]"
                                            value="{{ isset($mail) && $mail->attributes ? $mail->attributes[$key]->id : '' }}"
                                            :options="$mail_attribute" errorName="mail_attributes.{{ $key }}">
                                        </x-select>
                                    </div>
                                @endforeach

                                <div class="col-md-6">
                                    <x-input type="date" label="Tanggal Surat"
                                        value="{{ Carbon\Carbon::parse($mail->mail_created_at)->format('Y-m-d') }}"
                                        name="mail_created_at"></x-input>
                                </div>

                                <div class="col-md-6">
                                    <x-input type="file" label="Upload" name="file" placeholder="Upload File">
                                    </x-input>
                                </div>

                        </div>

                        <div class="col-12 mt-5">
                            <button class="btn btn-warning" type="submit">Ubah Surat</button>
                            <a href="{{ route(RouteHelper::get('mail.out.index')) }}" class="btn btn-secondary"
                                type="reset">Batal</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
