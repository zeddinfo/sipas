<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Mail;
use App\Services\MailServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MailOutRevisionController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);
    }

    public function store(Mail $mail, Request $request)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
