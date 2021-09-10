<div class="mt-5 table-responsive-sm mb-3">
    {!! $dataTable->table([], true) !!}
</div>

@section('script')
    {!! $dataTable->scripts() !!}
@endsection
