<div class="mt-5 table-responsive mb-3">
    {!! $dataTable->table([], true) !!}
</div>

@section('script')
    {!! $dataTable->scripts() !!}
@endsection
