<div class="table-responsive mt-4">
    <table class="table {{ count($mails) == 1 ? 'mb-20' : '' }}">
        <thead>
            <tr>
                <th scope="col" class="fw-bold">Surat</th>
                <th scope="col" class="fw-bold text-center">Instansi</th>
                <th scope="col" class="fw-bold text-center">Status Surat</th>
                <th scope="col" class="fw-bold text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-hover">
            @forelse($mails as $mail)
                <tr>
                    <td>
                        <a href="{{ route(RouteHelper::get('mail.in.show'), $mail) }}" class="text-dark">
                            <h4>{{ Str::limit($mail->title, 40) }}</h4>
                            <p class="fw-light mb-1">{{ $mail->code == '' ? 'No belum tersedia' : $mail->code }}</p>
                        </a>
                        @forelse ($mail->attributes as $attribute)
                            <label class="badge"
                                style="background: {{ $attribute->color }};">{{ Str::limit(Str::upper($attribute->name), 20) }}</label>
                        @empty
                            Belum ada attribute.
                        @endforelse
                    </td>
                    <td class="text-center align-middle">{{ Str::limit($mail->instance, 40) }}</td>
                    <td class="text-center align-middle">
                        <label
                            class="badge bg-{{ $mail->status['color'] }}">{{ Str::upper($mail->status['status']) }}</label><br>
                        <span class="text-muted font-weight-lighter badge">
                            @if ($mail->transaction == 'income')
                                Diterima
                            @else
                                Dikirim
                            @endif
                            {{ Carbon\Carbon::make($mail->transaction_time)->diffForHumans() }}
                        </span>
                    </td>
                    <td class="text-center align-middle">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-secondary rounded" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i data-feather="more-vertical" class="icon-xxs"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"
                                    href="{{ route(RouteHelper::get('mail.file.show'), ['mail' => $mail]) }}"
                                    target="_blank">Lihat Surat</a>

                                @if (MailServices::mailActionGate($mail, Auth::user()))
                                    <a href="{{ route('user.mail.in.forward.create', $mail) }}"
                                        class="dropdown-item">Teruskan</a>

                                    <x-button action="{{ route('user.mail.in.finishing.store', $mail) }}"
                                        class="dropdown-item">
                                        Selesai</x-button>
                                @endif
                                {{-- @if (Auth::user()->hasRole('TU'))
                                    <x-button action="{{ route('tu.mail.in.action.archive', $mail) }}"
                                        class="dropdown-item">
                                        Arsipkan</x-button>
                                @endif --}}
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
