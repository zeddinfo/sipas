<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row">
            <x-page-title page="Diposisi Surat" icon="bi-share"></x-page-title>
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

                            <tr>
                                <td class="align-top">
                                    <p>Tanggal Input</p>
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

            <!-- Riwayat Surat -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-6">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <x-form action="{{ route('user.mail.in.disposition.store', $mail) }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title mb-4">Catatan/Memo</h4>
                                    @csrf
                                    @method('POST')
                                    <div class="mb-3 ">
                                        <textarea id="textareaInput" name="memo" class="form-control"
                                            placeholder="Tulis catatan" rows="3"></textarea>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <h4 class="card-title mb-4">Dikirim ke</h4>
                                    <div class="mb-3">
                                        <select name="target_users[]" class="selectpicker" data-width="100%"
                                            title="Pilih penerima" data-live-search="true" multiple data-selected-text>
                                            @foreach ($target_users as $target_user)
                                                <option value="{{ $target_user->id }}"
                                                    data-subtext="{{ $target_user->getLevelDepartment() }}">
                                                    {{ $target_user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-success" type="submit">Teruskan</button>
                                    </div>
                                </div>
                            </div>
                        </x-form>
                        <!-- card title -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>
