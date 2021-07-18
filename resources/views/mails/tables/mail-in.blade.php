<table class="table">
    <thead>
    <tr>
        <th scope="col" class="fw-bold">Surat</th>
        <th scope="col" class="fw-bold text-center">Instansi</th>
        <th scope="col" class="fw-bold text-center">Status Surat</th>
        <th scope="col" class="fw-bold text-center">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @forelse($mails as $mail)
        <tr>
            <td>
                @if (Auth::user()->hasRole('TU'))
                    <a href="{{ route('tu.mail.in.show', ['id' => $mail->id]) }}" class="text-dark">
                        <div class="text-wrap">
                            <h6>{{ Str::limit($mail->title, 40) }}</h6>
                        </div>
                        <div>{{ $mail->code == "" ? "No belum tersedia" : $mail->code }}</div>
                    </a>
                @elseif (Auth::user()->hasRole('Admin'))
                    <a href="{{ route('admin.mail.in.show', ['id' => $mail->id]) }}" class="text-dark">
                        <div class="text-wrap">
                            <h6>{{ Str::limit($mail->title, 40) }}</h6>
                        </div>
                        <div>{{ $mail->code ?? 'No belum tersedia' }}</div>
                    </a>
                @else  
                    <a href="{{ route('user.mail.in.show', ['id' => $mail->id]) }}" class="text-dark">
                        <div class="text-wrap">
                            <h6>{{ Str::limit($mail->title, 40) }}</h6>
                        </div>
                        <div>{{ $mail->code ?? 'No belum tersedia' }}</div>
                    </a>
                @endif
                @forelse ($mail->attributes as $attribute)
                <label class="badge mt-2"
                style="background: {{ $attribute->color }};">{{ Str::upper($attribute->name) }}</label>
                @empty
                    Belum ada attribute.
                @endforelse
            </td>
            <td class="text-center align-middle">{{ Str::limit($mail->instance, 40) }}</td>
            <td class="text-center align-middle">
                <label class="badge mt-2"
                style="background: {{ $mail->status['color'] == 'success' ? '#58fd93' : '#ffd500' }};">{{ Str::upper($mail->status['status']) }}</label><br>
                <span class="text-muted font-weight-lighter badge">
                    @if ($mail->transaction == 'OUT')
                    Dikirim
                    @else
                    Diterima
                    @endif
                    {{ Carbon\Carbon::make($mail->transaction_time)->diffForHumans() }}
                </span>
            </td>
            <td class="text-center align-middle">
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary rounded" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="more-vertical" class="icon-xxs"></i>
                    </button>
                    <div class="dropdown-menu">
                        {{-- <a class="dropdown-menu" href="{{ route('admin.mail.master.show', ['mail' => $mail]) }}">Lihat</> --}}
                        {{-- @if (Auth::user()->hasRole('TU'))
                            <x-button class="dropdown-item"
                                      action="{{ route('admin.mail.master.download', ['mail' => $mail]) }}">
                                Teruskan
                            </x-button>
                        @endif --}}
                        
                        @if (Auth::user()->hasRole('TU') && $mail->code == null && $mail->status['status'] == 'Perlu Tanggapan')
                                <x-button class="dropdown-item"
                                          action="{{ route('admin.mail.master.download', ['mail' => $mail]) }}">
                                    Input Nomor Surat
                                </x-button>
                        @elseif ($mail_kind == 'OUT' && !Auth::user()->level == 'TU')
                                @if ($mail->status['status'] != 'Perlu Dikoreksi')
                                    @if (Auth::user()->level == 'Admin')
                                    @elseif (Auth::user()->level == 'User' && Auth::user()->level->name == 'Sekretaris' || Auth::user()->level->name == 'Ketua Umum')
                                    <x-button class="dropdown-item"
                                    action="{{ Auth::user()->level == 'Admin' ? route('admin.mail.out.show', ['mail' => $mail]) :  route('user.mail.in.disposition.show', ['mail' => $mail]) }}">
                                        Disposisikan
                                    </x-button>
                                    @endif
                                    <x-button class="dropdown-item"
                                    action="{{ Auth::user()->level == 'Admin' ? route('admin.mail.out.show', ['mail' => $mail]) :  route('user.mail.out.show', ['mail' => $mail]) }}">
                                        Teruskan
                                    </x-button>
                                @endif
                        @endif
                        @if (Auth::user()->hasRole('TU'))
                            <x-button class="dropdown-item"
                            action="{{ route('tu.mail.master.download', ['mail' => $mail]) }}">
                                Download
                            </x-button>
                        @elseif (Auth::user()->hasRole('Admin'))
                            <x-button class="dropdown-item"
                            action="{{ route('admin.mail.master.download', ['mail' => $mail]) }}">
                                Download
                            </x-button>
                        @else 
                            <x-button class="dropdown-item"
                            action="{{ route('user.mail.master.download', ['mail' => $mail]) }}">
                                Download
                            </x-button>
                        @endif
                        
                        @if (Auth::user()->level == 'TU' && $mail->status['status'] == 'Perlu Tanggapan')
                             <x-button class="dropdown-item" action="{{ route('tu.mail.master.archive', ['mail' => $mail]) }}">Arsipkan</x-button>                    
                        @endif

                        @if($mail_kind == 'IN')
                        <x-button class="dropdown-item"
                        action="{{ Auth::user()->level->name == 'Ketua Umum' ? route('user.mail.in.disposition.create', ['mail' => $mail]) : route('user.mail.in.forward.store', ['mail' => $mail])}}">
                            {{Auth::user()->level->name == 'Ketua Umum' ? 'Disposisikan' : 'Teruskan'}}
                        </x-button>
                        @endif
                    </div>
                </div>
            </td>
        </tr>
    @empty
        <h4>Tidak ada surat.</h4>
    @endforelse
    </tbody>
</table>
