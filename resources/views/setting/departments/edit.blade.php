<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>
    <div class="container-fluid px-6 py-4">
        <div class="py-6">
            <!-- Responsive tables -->
            <div cass="row mb-6">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div id="responsive-tables" class="mb-4">
                        <h2>Edit Department</h2>
                    </div>
                    <!-- Card -->
                    <div class="card">
                        <div class="tab-content p-4" id="pills-tabContent-basic-forms">
                            <div class="tab-pane tab-example-design fade show active" id="pills-basic-forms-design" role="tabpanel" aria-labelledby="pills-basic-forms-design-tab">
                                    <form class="row g-3" method="POST" action="{{ route('admin.setting.department.update', ['department' => $department]) }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="col-md-6">
                                            <x-input label="Departmen" value="{{$department->name}}" name="name" placeholder="Departmen"></x-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-select label="Sub Department" class="form-control"
                                            :value="isset($department->upperDepartment) ? $department->upperDepartment->id : ''"
                                            name="depends_on_id" :options="$departments">

                                        </x-select>
                                        </div>
                                        {{-- <div class="col-12">
                                            <button class="btn btn-success" type="submit">Simpan</button>
                                            <button class="btn btn-secondary" type="reset">Cancel</button>
                                        </div> --}}
                                        <div class="col-md-6 col-12 d-grid">
                                            <button class="btn btn-primary" type="submit">Ubah</button>
                                        </div>
    
                                        <div class="col-md-6 col-12 d-grid">
                                            <a class="btn btn-secondary"
                                                href="{{ route('admin.setting.level.index') }}">Batalkan</a>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('script')
    @include('sweetalert::alert')
@endsection
</x-app-layout>

