<?php

namespace App\Http\Controllers\Admin;

use Hash;
use App\Models\User;
use App\Models\Level;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use RealRashid\SweetAlert\Facades\Alert;

class UserSettingController extends Controller
{
    public function index()
    {
        $page = 'Data Pengguna';
        $users = User::with('level', 'department')->get();
        return view('setting.users.index', compact('users', 'page'));
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
        $user = new User();

        $user->nip = $request->nip;
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->level_id = $request->level_id;
        $user->department_id = $request->department_id;

        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

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
        $user = $user->with('level', 'department')->where('id', $user->id)->first();
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
        $user->level_id = $request->level_id;
        $user->department_id = $request->department_id;

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
