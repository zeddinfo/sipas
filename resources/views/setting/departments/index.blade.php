<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a class="btn btn-primary" href="{{ route('admin.setting.department.create') }}">Tambah
        Departemen</a>
</div>

<div class="mt-5 table-responsive-sm">
    {!! $dataTable->table([]) !!}
</div>

@section('script')
    {!! $dataTable->scripts() !!}
@endsection
