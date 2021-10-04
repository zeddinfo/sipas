<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a class="btn btn-primary" href="{{ route('admin.setting.mail.attribute.create') }}">Tambah
        Atribut</a>
</div>

<div class="mt-5 table-responsive-sm">
    {!! $dataTable->table(['border']) !!}
</div>

@section('script')
    {!! $dataTable->scripts() !!}
@endsection
