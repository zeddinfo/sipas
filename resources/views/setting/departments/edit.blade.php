<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row mb-6">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <x-page-title page="Ubah Departemen" icon="bi-bookmark"></x-page-title>
                <!-- Card -->
                <div class="card mt-6 mb-6">
                    <div class="tab-content p-4" id="pills-tabContent-basic-forms">
                        <div class="tab-pane tab-example-design fade show active" id="pills-basic-forms-design"
                            role="tabpanel" aria-labelledby="pills-basic-forms-design-tab">
                            <form class="row g-3" method="POST"
                                action="{{ route('admin.setting.department.update', ['department' => $department]) }}">
                                @csrf
                                @method('PATCH')
                                <div class="col-md-6">
                                    <x-input label="Departemen" value="{{ $department->name }}" name="name"
                                        placeholder="Departmen"></x-input>
                                </div>
                                <div class="col-md-6">
                                    <x-select label="Sub Dari Departemen" class="form-control"
                                        :value="isset($department->upperDepartment) ? $department->upperDepartment->id : ''"
                                        name="depends_on_id" :options="$departments">

                                    </x-select>
                                </div>

                                <div class="col-12 d-grid d-md-block">
                                    <button class="btn btn-primary" type="submit">Ubah</button>
                                    <a class="btn btn-secondary mt-2 mt-md-0"
                                        href="{{ route('admin.setting.department.index') }}">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
