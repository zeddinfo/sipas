<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use Hash;
use App\Models\User;
use App\Models\Level;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\UserRole;
use RealRashid\SweetAlert\Facades\Alert;

class UserSettingController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        $title = 'Data Pengguna';
        $icon = 'bi-people';
        $table_view = "setting.users.index";
        return $dataTable->render('setting.index', compact('title', 'icon', 'table_view'));
    }

    public function create()
    {
        $position = Level::select('id', 'name')->get();
        $department = Department::select('id', 'name')->get();

        if ($position->count() == 0 || $department->count() == 0) {
            return redirect('/')->withErrors('Silahkan tambahkan jabatan atau bidang untuk menambahkan user');
        }
        return view('setting.users.create')->with(compact('position', 'department'));
    }

    public function store(CreateUserRequest $request)
    {
        // Create User instance
        $user = new User();

        $user->nip = $request->nip;
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;

        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Create UserRole instance
        $userRole = new UserRole();
        $userRole->user_id = $user->id;
        $userRole->level_id = $request->level_id;
        $userRole->department_id = $request->department_id;
        $userRole->active = true;
        $userRole->save();

        Alert::success('Yay :D', 'Berhasil menambahkan pengguna');
        return redirect(route('admin.setting.user.index'));
    }

    public function show(User $user, $id)
    {
        $user = $user->where('id', $id);
        return view('setting.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $level = Level::select('id', 'name')->get();
        $department = Department::select('id', 'name')->get();

        return view('setting.users.edit')->with(compact('level', 'department', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->nip = $request->nip;
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;

        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        Alert::success('Yay :D', 'Berhasil mengubah pengguna');
        return redirect(route('admin.setting.user.edit', $user));
    }

    public function destroy(User $user)
    {
        $user->delete();
        Alert::success('Yay :D', 'Berhasil menghapus pengguna');
        return redirect(route('admin.setting.user.index'));
    }
}
