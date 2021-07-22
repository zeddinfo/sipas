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
                        <h2>Edit Jabatan</h2>
                    </div>
                    <!-- Card -->
                    <div class="card">
                        <div class="tab-content p-4" id="pills-tabContent-basic-forms">
                            <div class="tab-pane tab-example-design fade show active" id="pills-basic-forms-design"
                                role="tabpanel" aria-labelledby="pills-basic-forms-design-tab">
                                <form class="row g-3" method="POST"
                                    action="{{ route('admin.setting.level.update', ['level' => $level]) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="col-md-6">
                                        <x-input label="Jabatan" value="{{ $level->name }}" name="name"
                                            placeholder="Jabatan"></x-input>
                                    </div>
                                    <div class="col-md-6">
                                        <x-select label="Privelege Akses" class="form-control"
                                            :value="isset($level->sameLevel) ? $level->sameLevel->id : ''"
                                            name="same_as_id" :options="$levels">

                                        </x-select>
                                    </div>

                                    <div class="col-12 d-grid d-md-block">
                                        <button class="btn btn-primary" type="submit">Ubah</button>
                                        <a class="btn btn-secondary mt-2 mt-md-0"
                                            href="{{ route('admin.setting.level.index') }}">Kembali</a>
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
