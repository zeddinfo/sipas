<?php

namespace App\Http\Controllers\User;

use App\Events\DispositionMailIn;
use App\Events\ForwardedMailIn;
use App\Events\ForwardedMailOut;
use App\Http\Controllers\Controller;
use App\Models\Mail;
use App\Services\MailServices;
use Auth;
use Illuminate\Http\Request;

class MailInActionController extends Controller
{
    public function forward(Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);
        if (!Auth::user()->hasDisposition()) {
            return redirect(route('user.mail.in.disposition.create'));
        }

        return redirect(route('user.mail.in.forward.create'));
    }
}
