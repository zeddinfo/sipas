<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountSettingRequest;
use App\Models\Department;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
    }

    public function update(AccountSettingRequest $request)
    {
        $request->validated();

        $user = Auth::user();
        $user->nip = $request->nip;
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
    }
}
