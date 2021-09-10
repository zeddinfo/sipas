<div class="btn-group">
    <button type="button" class="btn btn-outline-secondary rounded" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-more-vertical icon-xxs">
            <circle cx="12" cy="12" r="1"></circle>
            <circle cx="12" cy="5" r="1"></circle>
            <circle cx="12" cy="19" r="1"></circle>
        </svg>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route(RouteHelper::get('mail.file.show'), $mail) }}" target="_blank">Lihat
            Surat</a>

        @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('TU'))
            <a class="dropdown-item" href="{{ route(RouteHelper::get('mail.master.edit'), $mail) }}">Ubah
                Surat</a>

            <x-button method="delete" action="{{ route(RouteHelper::get('mail.master.destroy'), $mail) }}"
                class="dropdown-item">
                Hapus</x-button>
        @endif
    </div>
</div>
