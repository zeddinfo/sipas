<?php

namespace App\Http\Controllers\User;

use App\Events\ForwardedMailIn;
use App\Http\Controllers\Controller;
use App\Http\Requests\MailInForwardRequest;
use App\Models\Mail;
use App\Services\MailServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MailInForwardController extends Controller
{
    public function create(Mail $mail)
    {

        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);
        if (Auth::user()->hasDisposition()) {
            // dd('tidak punya akses');
            return redirect(route('user.mail.in.disposition.create'));
        }
    }

    public function store(MailInForwardRequest $request, Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);


        event(new ForwardedMailIn($mail, request()));
    }
}
