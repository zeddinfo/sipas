<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use App\Utilities\RouteHelper;
use Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ChangeAccountAccessController extends Controller
{
    public function update(UserRole $switchUserRole)
    {
        $user = Auth::user();

        abort_if($switchUserRole->user_id != $user->id, 404);

        if ($switchUserRole->active) {
            Alert::warning('Ups !', 'Saat ini anda sedang menggunakan akses pengguna yang dipilih.');
            return redirect(route(RouteHelper::get('dashboard.index')));
        }

        $userRoles = $user->userRoles;

        foreach ($userRoles as $userRole) {
            $userRole->active = false;
            $userRole->save();
        }

        $switchUserRole->active = true;
        $switchUserRole->save();

        Alert::success("Yay :)", 'Berhasil mengganti akses pengguna menjadi ' . $user->level->name . ' ' . $user->department?->name . '.');
        return redirect(route(RouteHelper::get('dashboard.index')));
        // $userRoles = $user->userRoles;

        // $activeUserRole = $userRoles->filter(function ($userRole) {
        //     return $userRole->active;
        // })->first();

        // $deactiveUserRole = $userRoles->filter(function ($userRole) {
        //     return !$userRole->active;
        // })->first();

        // $activeUserRole->active = !$activeUserRole->active;
        // $activeUserRole->save();

        // $deactiveUserRole->active = !$deactiveUserRole->active;
        // $deactiveUserRole->save();
    }
}
