<?php

namespace App\Http\Controllers\User;

use App\Models\Mail;
use Illuminate\Http\Request;
use App\Services\MailServices;
use App\Events\ForwardedMailIn;
use App\Models\MailTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Events\ForwardedMailInProcess;
use App\Events\DispositedMailInProcess;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\MailInForwardRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Providers\ForwardedMailIn as ProvidersForwardedMailIn;
use App\Utilities\SendEmailHelper;

class MailInForwardController extends Controller
{
    public function create(Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);

        // if (Auth::user()->hasDisposition()) {
        // }

        // $target_users = Auth::user()->getLowerUsers('in');
        // $target_users->load('level', 'department');

        // return view('mails.partials.forward', compact('mail', 'target_users'));
        return redirect(route('user.mail.in.disposition.create', $mail));
    }

    public function store(MailInForwardRequest $request, Mail $mail)
    {
        $target_user_ids = $request->target_users;

        abort_if(!MailServices::mailActionGate($mail, Auth::user())
            || !Auth::user()->checkLowerUserIds($target_user_ids)
            || Auth::user()->hasDisposition(), 404);


        foreach ($target_user_ids as $target_user_id) {
            $mail_transaction = new MailTransaction();
            $mail_transaction->mail_version_id = $mail->versions()->orderBy('id', 'DESC')->first()->id;
            $mail_transaction->user_id = Auth::user()->id;
            $mail_transaction->target_user_id = $target_user_id;
            $mail_transaction->type = MailTransaction::TYPE_FORWARD;
            $mail_transaction->save();

            event(new ForwardedMailInProcess($mail_transaction, $request));

            $MailNotification = new SendEmailHelper();
            $MailNotification::sendEmail($target_user_id, "Pemberitahuan", "Surat Masuk", "Teruskan");
        }

        Alert::success('Yay :D', 'Berhasil meneruskan surat');
        return redirect(route('user.mail.in.index'));
    }
}
