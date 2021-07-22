<?php

namespace App\Http\Controllers\User;

use App\Models\Mail;
use Illuminate\Http\Request;
use App\Models\MailAttribute;
use App\Services\MailServices;
use App\Events\CreatedMailInProcess;
use App\Events\UpdatedMailInProcess;
use App\Http\Controllers\Controller;
use App\Http\Requests\MailInRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\MailAttributeTransaction;
use App\Repositories\UsersMailRepository;

class MailInController extends Controller
{
    public function index()
    {
        $page = "Masuk";
        $mail_repository = new UsersMailRepository();

        $mail_kind = Mail::TYPE_IN;
        $mails = $mail_repository->getMails($mail_kind);

        return view('mails.index', compact('page', 'mail_kind', 'mails'));
    }

    public function show(Mail $mail)
    {
        abort_if(!MailServices::mailViewGate($mail, Auth::user()), 404);

        $mail->load('attributes', 'versions.mailTransactions', 'versions.mailTransactions.logs');


        dd($mail->versions[0]->mailTransactions[0]->logs);

        return view('mails.show')->with(compact('mail'));
    }

    public function destroy($id)
    {
        //
    }
}
