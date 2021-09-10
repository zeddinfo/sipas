<?php

namespace App\Http\Controllers\User;

use App\Models\Mail;
use App\Models\MailLog;
use Illuminate\Http\Request;
use App\Services\MailServices;
use App\Models\MailTransaction;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MailInFinishingController extends Controller
{
    public function store(Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);

        $user = Auth::user();

        $mail_transaction = new MailTransaction();
        $mail_transaction->mail_version_id = $mail->versions()->orderBy('id', 'DESC')->first()->id;
        $mail_transaction->user_id = $user->id;
        $mail_transaction->type = MailTransaction::TYPE_FINISHED;
        $mail_transaction->save();

        $mail_log = new MailLog();
        $mail_log->mail_id = $mail->id;
        $mail_log->log = MailLog::LOG_FINISHED;
        $mail_log->user_name = $user->name;
        $mail_log->user_level_department = $user->getLevelDepartment();
        $mail_log->save();

        // Do Automoatic Archive
        $latest_mail_version = $mail->versions()->latest()->first();
        $mail_transactions = MailTransaction::where('mail_version_id', $latest_mail_version->id)->orderByDesc('id')->get();

        $latest_mail_transactions_count = 0;
        $sender_users_id = [];

        foreach ($mail_transactions as $key => $mail_transaction) {
            // Push sender to $sender_users_id
            $sender_users_id[] = $mail_transaction->user_id;

            // If target not in_array $sender -> Count MailTransaction
            if (!in_array($mail_transaction->target_user_id, $sender_users_id)) {
                $latest_mail_transactions_count++;
            }
        }

        $finished_mail_transactions_count = MailTransaction::where('type', MailTransaction::TYPE_FINISHED)->where('mail_version_id', $latest_mail_version->id)->orderByDesc('id')->count();

        if ($finished_mail_transactions_count == $latest_mail_transactions_count) {
            $mail->archived_at = Carbon::now();
            $mail->save();
        }

        Alert::success('Yay :D', 'Berhasil menyelesaikan tanggapan surat');
        return redirect(route('user.mail.in.index'));
    }
}
