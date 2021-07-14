<?php

namespace App\Http\Controllers\User;

use App\Models\Mail;
use Illuminate\Http\Request;
use App\Services\MailServices;
use App\Models\MailTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Events\RevisedMailOutProcess;
use App\Models\MailTransactionCorrection;
use App\Http\Requests\MailRevisionRequest;

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


    public function store(Mail $mail, MailRevisionRequest $request)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);

        $user = Auth::user();

        $mail_transaction = new MailTransaction();
        $mail_transaction->user_id = $user->id;
        $mail_transaction->target_user_id = $user->getSameUser()->targetMailTransactions()->where('mail_version_id', $mail->id)->first()->user_id;
        $mail_transaction->mail_version_id = $mail->versions()->orderBy('id', 'DESC')->first()->id;
        $mail_transaction->type = MailTransaction::TYPE_REVISION;
        $mail_transaction->save();

        event(new RevisedMailOutProcess($mail_transaction, $request));
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
