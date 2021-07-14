<?php

namespace App\Http\Controllers\User;

use App\Models\Mail;
use Illuminate\Http\Request;
use App\Services\MailServices;
use App\Events\ForwardedMailOut;
use App\Http\Controllers\Controller;
use App\Models\MailTransaction;
use Illuminate\Support\Facades\Auth;

class MailOutForwardController extends Controller
{
    public function store(Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);

        $user = Auth::user();

        $mail_transaction = new MailTransaction();
        $mail_transaction->user_id = $user->id;
        $mail_transaction->target_user_id = $user->getUpperUser('out')->id;
        $mail_transaction->mail_version_id = $mail->versions()->orderBy('id', 'DESC')->first()->id;
        $mail_transaction->type = MailTransaction::TYPE_FORWARD;
        $mail_transaction->save();

        event(new ForwardedMailOut($mail_transaction, request()));
    }
}
