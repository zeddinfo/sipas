<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row mb-6">
            <x-page-title page="Detail Surat" icon="bi-envelope"></x-page-title>
            <!-- Detail Surat -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <!-- card -->
                <div class="card mt-6 mb-6">
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
                                    <p class="fw-bold">{{ $mail->title }}</p>
                                </td>
                            </tr>

                            <tr>
                                <td class="align-top">
                                    <p>Nomor Surat</p>
                                </td>
                                <td class="align-top">
                                    <p class="px-2">:</p>
                                </td>
                                <td class="align-top">
                                    <p class="fw-bold">{{ $mail->code }}</p>
                                </td>
                            </tr>

                            <tr>
                                <td class="align-top">
                                    <p>Tanggal Surat</p>
                                </td>
                                <td class="align-top">
                                    <p class="px-2">:</p>
                                </td>
                                <td class="align-top">
                                    <p class="fw-bold">{{ $mail->mail_created_at->isoFormat('D MMMM Y') }}</p>
                                </td>
                            </tr>

                            @if ($mail->type == 'IN')
                                <tr>
                                    <td class="align-top">
                                        <p>Tanggal Surat Diterima</p>
                                    </td>
                                    <td class="align-top">
                                        <p class="px-2">:</p>
                                    </td>
                                    <td class="align-top">
                                        <p class="fw-bold">{{ $mail->mail_received_at->isoFormat('D MMMM Y') }}</p>
                                    </td>
                                </tr>
                            @endif

                            <tr>
                                <td class="align-top">
                                    <p>Tanggal Dibuat</p>
                                </td>
                                <td class="align-top">
                                    <p class="px-2">:</p>
                                </td>
                                <td class="align-top">
                                    <p class="fw-bold">{{ $mail->created_at->isoFormat('D MMMM Y') }}</p>
                                </td>
                            </tr>

                            @if ($mail->archived_at != null)
                                <tr>
                                    <td class="align-top">
                                        <p>Tanggal Arsip</p>
                                    </td>
                                    <td class="align-top">
                                        <p class="px-2">:</p>
                                    </td>
                                    <td class="align-top">
                                        <p class="fw-bold">{{ $mail->archived_at->isoFormat('D MMMM Y') }}</p>
                                    </td>
                                </tr>
                            @endif

                            <tr>
                                <td class="align-top">
                                    <p>Instansi</p>
                                </td>
                                <td class="align-top">
                                    <p class="px-2">:</p>
                                </td>
                                <td class="align-top">
                                    <p class="fw-bold">{{ $mail->instance }}</p>
                                </td>
                            </tr>

                            @foreach ($mail->attributes as $attribute)
                                <tr>
                                    <td class="align-top">
                                        <p class="">{{ $attribute->type }} Surat</p>
                                    </td>
                                    <td class="align-top">
                                        <p class="px-2">:</p>
                                    </td>
                                    <td class="align-top">
                                        <p class="fw-bold">{{ $attribute->name }}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        <div class="row">
                            <div class="col-12 d-grid">
                                <a target="__blank" href="{{ route(RouteHelper::get('mail.file.show'), $mail) }}"
                                    class="btn btn-secondary">Lihat Surat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mail Logs -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-6">
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
                                    <td>{{ $log->created_at->isoFormat('D MMMM Y (hh:mm)') }}</td>
                                </tr>
                            @empty
                                Belum ada aktivitas surat
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>

            <!-- Mail Action -->
            @if ($mail->archived_at == null)
                @if (MailServices::mailActionGate($mail, Auth::user()))
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-6">
                        <div class="row justify-content-center">
                            @if ($mail->type == 'IN')
                                <div class="col-4 d-grid">
                                    <a href="{{ route('user.mail.in.forward.create', $mail) }}"
                                        class="btn btn-outline-primary rounded-pill">Teruskan Surat</a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            @endif
        </div>

</x-app-layout>
