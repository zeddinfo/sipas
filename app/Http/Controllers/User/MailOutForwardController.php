<?php

namespace App\Http\Controllers\User;

use App\Models\Mail;
use Illuminate\Http\Request;
use App\Services\MailServices;
use App\Events\ForwardedMailOut;
use App\Http\Controllers\Controller;
use App\Models\MailTransaction;
use App\Utilities\SendEmailHelper;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MailOutForwardController extends Controller
{
    public function create(Mail $mail)
    {
    }

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

        $MailNotification = new SendEmailHelper();
        $MailNotification::sendEmail($user->getUpperUser('out')->id, "Pemberitahuan", "Surat Keluar", "Teruskan");

        Alert::success('Yay :D', 'Berhasil Meneruskan Surat.');
        return redirect(route('user.mail.out.index'));
    }
}
