<?php

namespace App\Http\Controllers\User;

use App\Models\Mail;
use Illuminate\Http\Request;
use App\Models\MailAttribute;
use App\Services\FileServices;
use App\Services\MailServices;
use App\Models\MailTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Events\RevisedMailOutProcess;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\MailTransactionCorrection;
use App\Http\Requests\MailRevisionRequest;

class MailOutRevisionController extends Controller
{
    public function create(Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);

        $page = 'Revisi Surat';
        $mail = Mail::with('attributes')->where('id', $mail->id)->first();

        $sifat = MailAttribute::get()->where('type', 'Sifat');
        $tipe = MailAttribute::get()->where('type', 'Tipe');
        $prioritas = MailAttribute::get()->where('type', 'Prioritas');
        $folder = MailAttribute::get()->where('type', 'Folder');

        return view('mails.partials.revision', compact('page', 'mail', 'sifat', 'tipe', 'prioritas', 'folder'));
    }


    public function store(Mail $mail, MailRevisionRequest $request)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);

        $user = Auth::user();

        $mail_transactions = $user->getSameUser()->targetMailTransactions()->whereIn('mail_version_id', $mail->versions->pluck('id'))->orderBy('id', 'DESC')->get();

        $target_user_id = null;

        foreach ($mail_transactions as $mail_transaction) {
            if (in_array($mail_transaction->user_id, $user->getLowerUsers('out')->pluck('id')->toArray())) {
                $target_user_id = $mail_transaction->user_id;
                break;
            }
        }

        $mail_transaction = new MailTransaction();
        $mail_transaction->user_id = $user->id;
        $mail_transaction->target_user_id = $target_user_id;
        $mail_transaction->mail_version_id = $mail->versions()->orderBy('id', 'DESC')->first()->id;
        $mail_transaction->type = MailTransaction::TYPE_REVISION;
        $mail_transaction->save();

        event(new RevisedMailOutProcess($mail_transaction, $request));

        Alert::success('Yay :D', 'Revisi berhasil dirikirim.');
        return redirect(route('user.mail.out.index'));
    }

    public function show(MailTransactionCorrection $mail_transaction_correction)
    {
        return redirect(FileServices::extensionAdapter($mail_transaction_correction->file));
    }
}
