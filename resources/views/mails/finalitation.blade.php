<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row">
            <x-page-title page="Koreksi Surat" icon="bi-house"></x-page-title>
            <!-- Detail Surat -->
            <div class="col-md-12">
                <!-- card -->
                <div class="card">
                    <div class="tab-content p-4" id="pills-tabContent-basic-forms">
                        <div class="tab-pane tab-example-design fade show active" id="pills-basic-forms-design" role="tabpanel" aria-labelledby="pills-basic-forms-design-tab">
                            <form class="row g-3" method="POST" action="{{ route('tu.mail.out.final.update', ['mail' => $mail->id]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="col-md-6">
                                    <x-input type="text" label="Judul Surat" value="{{$mail->title}}" name="title" placeholder="Judul Surat"></x-input>
                                </div>
                                <div class="col-md-6">
                                    <x-input type="text" label="Instansi" value="{{$mail->instance}}" name="instance" placeholder="Instansi"></x-input>
                                </div>
                                <div class="col-md-6">
                                    <x-input type="text" label="Kode Surat" name="code" value="{{$mail->code}}" placeholder="Kode Surat"></x-input>
                                </div>
                                <div class="col-md-6">
                                    <x-input type="text" label="Kode Arsip" name="directory_code" placeholder="Kode Arsip"></x-input>
                                </div>
                                <div class="form-group col-md-3">
                                    <x-select label="Tipe Surat" name="mail_attributes[]" value="{{isset($mail) && $mail->attributes ? $mail->attributes[0]->id : ''}}" :options="$tipe">

                                    </x-select>
                                </div>
                                <div class="col-md-3">
                                    <x-select label="Sifat Surat" name="mail_attributes[]"  value="{{isset($mail) && $mail->attributes ? $mail->attributes[1]->id : ''}}" :options="$sifat">

                                    </x-select>
                                </div>
                                <div class="form-group col-md-3">
                                    <x-select label="Prioritas Surat" name="mail_attributes[]" value="{{isset($mail) && $mail->attributes ? $mail->attributes[2]->id : ''}}" :options="$prioritas">

                                    </x-select>
                                </div>
                                {{-- <div class="form-group col-md-3">
                                    <x-select label="Folder Surat" name="folder" value="{{isset($mail) && $mail->attributes ? $mail->attributes[3]->id : ''}}" :options="$folder">

                                    </x-select>
                                </div> --}}
                                <div class="col-md-6">
                                    <x-input type="date" label="Waktu Surat" value="{{Carbon\Carbon::parse($mail->mail_created_at)->format('Y-m-d')}}" name="mail_created_at"></x-input>
                                </div>
                                <div class="col-md-6">
                                    <x-input type="file" label="Upload" name="file" placeholder="Upload File"></x-input>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-warning" type="submit">Update Surat</button>
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

</x-app-layout>