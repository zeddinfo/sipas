<?php

namespace App\Http\Controllers\User;

use App\Models\Level;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\AccountSettingRequest;

class AccountController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $form_action = route('user.setting.account.update');

        return view('account.edit', compact('user', 'form_action'));
    }

    public function update(AccountSettingRequest $request)
    {
        $user = Auth::user();
        $user->nip = $request->nip;
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;

        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        Alert::success('Yay :D', 'Berhasil mengubah informasi akun');
        return redirect(route('user.setting.account.edit'));
    }
}
