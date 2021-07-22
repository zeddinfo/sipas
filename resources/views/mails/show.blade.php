<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row">
            <x-page-title page="Detail Surat" icon="bi-envelope"></x-page-title>
            <!-- Detail Surat -->
            <div class="col-xl-6 col-lg-6 col-md-12 col-12 mt-6">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- card title -->
                        <h4 class="card-title fw-bold text-primary mb-4">Informasi Surat</h4>
                        <hr>
                        <!-- row -->
                        <table>
                            <tr>
                                <td class="align-top">
                                    <p>Judul Surat</p>
                                </td>
                                <td class="align-top">
                                    <p class="px-2">:</p>
                                </td>
                                <td class="align-top">
                                    <p class="fw-bold">{{ $mail->title }} Pada Tahapan Konstruksi Kimia</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="">Nomor Surat</p>
                                </td>
                                <td class="align-top">
                                    <p class="px-2">:</p>
                                </td>
                                <td class="align-top">
                                    <p class="fw-bold">{{ $mail->code }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="">Instansi</p>
                                </td>
                                <td class="align-top">
                                    <p class="px-2">:</p>
                                </td>
                                <td class="align-top">
                                    <p class="fw-bold">{{ $mail->instance }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="">Jenis Surat</p>
                                </td>
                                <td class="align-top">
                                    <p class="px-2">:</p>
                                </td>
                                <td class="align-top">
                                    @php
                                        $mail_attribute = $mail->attributes->where('type', 'Tipe')->first();
                                    @endphp
                                    <x-badge name="{{ $mail_attribute->name }}"
                                        color="{{ $mail_attribute->color }}"></x-badge>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="">Sifat Surat</p>
                                </td>
                                <td class="align-top">
                                    <p class="px-2">:</p>
                                </td>
                                <td class="align-top">
                                    @php
                                        $mail_attribute = $mail->attributes->where('type', 'Sifat')->first();
                                    @endphp
                                    <x-badge name="{{ $mail_attribute->name }}"
                                        color="{{ $mail_attribute->color }}"></x-badge>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="">Prioritas Surat</p>
                                </td>
                                <td class="align-top">
                                    <p class="px-2">:</p>
                                </td>
                                <td class="align-top">
                                    @php
                                        $mail_attribute = $mail->attributes->where('type', 'Prioritas')->first();
                                    @endphp
                                    <x-badge name="{{ $mail_attribute->name }}"
                                        color="{{ $mail_attribute->color }}"></x-badge>
                                </td>
                            </tr>
                        </table>

                        <div class="row">
                            <div class="col-12 d-grid">
                                <a target="__blank" href="{{ route(RouteHelper::get('mail.file.show'), $mail) }}"
                                    class="btn btn-primary">Lihat Surat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Riwayat Surat -->
            <div class="col-xl-6 col-lg-6 col-md-12 col-12 mt-6">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- card title -->
                        <h4 class="card-title fw-bold text-primary mb-4">Riwayat Surat</h4>
                        <hr>
                        <table class="table">
                            <thead>
                                <td class="fw-bold">Aktivitas</td>
                                <td class="fw-bold">Waktu</td>
                            </thead>
                            @forelse ($mail->logs as $log)
                                <tr>
                                    <td>{{ $log->getLogMessage() }}</td>
                                    <td>{{ $log->created_at }}</td>
                                </tr>
                            @empty
                                Belum ada aktivitas surat
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>
