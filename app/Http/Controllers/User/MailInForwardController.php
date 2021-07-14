<?php

namespace App\Http\Controllers\User;

use App\Models\Mail;
use Illuminate\Http\Request;
use App\Services\MailServices;
use App\Events\ForwardedMailIn;
use App\Models\MailTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Events\DispositedMailInProcess;
use App\Events\ForwardedMailInProcess;
use App\Http\Requests\MailInForwardRequest;
use App\Providers\ForwardedMailIn as ProvidersForwardedMailIn;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MailInForwardController extends Controller
{
    use RefreshDatabase;

    protected $seed = true;

    public function create(Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);

        if (Auth::user()->hasDisposition()) {
            return redirect(route('user.mail.in.disposition.create', $mail));
        }
    }

    public function store(MailInForwardRequest $request, Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()) || !Auth::user()->checkLowerUserIds($request->target_user_ids), 404);

        $target_user_ids = $request->target_user_ids;

        foreach ($target_user_ids as $target_user_id) {
            $mail_transaction = new MailTransaction();
            $mail_transaction->mail_version_id = $mail->versions()->orderBy('id', 'DESC')->first()->id;
            $mail_transaction->user_id = Auth::user()->id;
            $mail_transaction->target_user_id = $target_user_id;
            $mail_transaction->type = MailTransaction::TYPE_FORWARD;
            $mail_transaction->save();

            event(new ForwardedMailInProcess($mail_transaction, $request));
        }
        // event(new ForwardedMailIn($mail, request()));
    }
}
