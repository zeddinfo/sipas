<?php

namespace App\Http\Controllers\User;

use App\Events\ForwardedMailOut;
use App\Http\Controllers\Controller;
use App\Models\Mail;
use App\Models\MailTransaction;
use App\Services\MailServices;
use Auth;
use Illuminate\Http\Request;

class MailOutActionController extends Controller
{
    public function forward(Mail $mail)
    {
        // abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);

        // event(new ForwardedMailOut($mail, request()));
    }
}
