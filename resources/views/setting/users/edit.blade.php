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
                        <h2>Edit Pengguna</h2>
                    </div>
                    <!-- Card -->
                    <div class="card">
                        <div class="tab-content p-4" id="pills-tabContent-basic-forms">
                            <div class="tab-pane tab-example-design fade show active" id="pills-basic-forms-design" role="tabpanel" aria-labelledby="pills-basic-forms-design-tab">
                                <form class="row g-3" method="post" action="{{ route('admin.setting.user.update', ['id' => $user->id]) }}">
                                    @csrf
                                    @method('patch')
                                    <div class="col-md-8">
                                        <x-input type="text" class="form-control" label="Nama" value="{{$user->name}}" name="nama" placeholder="Nama"></x-input>
                                    </div>
                                    <div class="col-md-4">
                                        <x-input type="text" class="form-control" label="NIP" name="nip" :value="$user->nip" placeholder="NIP"></x-input>
                                    </div>
                                    <div class="col-md-6">
                                        <x-select label="Level" class="form-control" :value="$user->level->id" name="level" :options="$level">

                                        </x-select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-select label="Departemen" class="form-control" :value="$user->department->id" name="department" :options="$department">

                                        </x-select>
                                    </div>
                                    <div class="col-md-6">
                                        <x-input type="password" class="form-control" label="Password"  name="password" placeholder="Password"></x-input>
                                    </div>
                                    <div class="col-md-6">
                                        <x-input type="text" class="form-control" label="Email" :value="$user->email" name="email" placeholder="Email"></x-input>
                                    </div>
                                    <div class="col-md-6">
                                        <x-input type="text" :value="$user->phone_number" class="form-control" label="Telepon" name="phone_number" placeholder="Telepone"></x-input>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Submit form</button>
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
