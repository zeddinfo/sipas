<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row">
            <x-page-title page="Revisi Surat" icon="bi-file-earmark-excel"></x-page-title>
            <!-- Detail Surat -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-6 mb-6">
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
                                    <p class="fw-bold">{{ $mail->title }}</p>
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

                            @foreach ($mail->attributes as $attribute)
                                <tr>
                                    <td>
                                        <p class="">{{ $attribute->type }} Surat</p>
                                    </td>
                                    <td class="align-top">
                                        <p class="px-2">:</p>
                                    </td>
                                    <td class="align-top">
                                        <x-badge name="{{ $attribute->name }}" color="{{ $attribute->color }}">
                                        </x-badge>
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

            <!-- Riwayat Surat -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-6">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <form action="{{ route('user.mail.out.revision.store', $mail) }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="textareaInput">Catatan Revisi</label>
                                    <div class="mb-3 ">
                                        <textarea id="textareaInput" name="note" class="form-control"
                                            placeholder="Tulis catatan" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <x-input type="file" label="Upload File Coretan Revisi (Bila diperlukan)"
                                        name="file" placeholder="Upload File Revisi (Bila diperlukan)">
                                    </x-input>
                                </div>

                                <div class="mt-5 d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Kirim Revisi Surat</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- card title -->
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</x-app-layout>
