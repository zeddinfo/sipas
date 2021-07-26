<?php

namespace App\Http\Controllers\User;

use App\Models\Mail;
use App\Models\User;
use MailTransactions;
use Illuminate\Http\Request;
use App\Services\MailServices;
use App\Models\MailTransaction;
use App\Events\DispositionMailIn;
use App\Models\MailTransactionMemo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Events\DispositedMailInProcess;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\DispositionRequest;
use App\Http\Requests\MailInForwardRequest;

class MailInDispositionController extends Controller
{
    public function create(Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()) || !Auth::user()->hasDisposition(), 404);

        $target_users = Auth::user()->getLowerUsers('in');
        $target_users->load('level', 'department');

        return view('mails.partials.disposition', compact('mail', 'target_users'));
    }

    public function store(DispositionRequest $request, Mail $mail)
    {
        $target_user_ids = $request->target_users;

        abort_if(!MailServices::mailActionGate($mail, Auth::user())
            || !Auth::user()->hasDisposition()
            || !Auth::user()->checkLowerUserIds($target_user_ids), 404);


        foreach ($target_user_ids as $target_user_id) {
            $mail_transaction = new MailTransaction();
            $mail_transaction->mail_version_id = $mail->versions()->orderBy('id', 'DESC')->first()->id;
            $mail_transaction->user_id = Auth::user()->id;
            $mail_transaction->target_user_id = $target_user_id;
            $mail_transaction->type = MailTransaction::TYPE_DISPOSITION;
            $mail_transaction->save();

            event(new DispositedMailInProcess($mail_transaction, $request));
        }

        Alert::success('Yay :D', 'Berhasil mendisposisikan surat');
        return redirect(route('user.mail.in.index'));
    }
}
