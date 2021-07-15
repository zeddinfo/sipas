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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'Data Pengguna';
        $users = User::with('level', 'department')->get();
        return view('setting.users.index', compact('users', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $position = Level::select('id', 'name')->get();
        $department = Department::select('id', 'name')->get();

        if ($position->count() == 0 || $department->count() == 0) {
            return redirect('/')->withErrors('Silahkan tambahkan jabatan atau bidang untuk menambahkan user');
        }
        return view('settings.users.create')->with(compact('position', 'department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        User::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, $id)
    {
        dd($user);
        $user = $user->where('id', $id);
        return view('settings.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = $user->with('level', 'department')->where('id', $user->id)->first();
        $level = Level::select('id', 'name')->get();
        $department = Department::select('id', 'name')->get();

        return view('setting.users.edit')->with(compact('level', 'department', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        Alert::success('Yay :D', 'Berhasil menghapus pengguna');
        return redirect(route('admin.setting.user.index'));
    }
}
