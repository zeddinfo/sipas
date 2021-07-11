<?php

namespace App\Services;

use App\Models\Mail;
use App\Models\MailTransaction;
use App\Models\User;
use App\Repositories\UsersMailVersionRepository;
use Illuminate\Database\Eloquent\Builder;

class MailServices
{
    public static function mailActionGate(Mail $mail, User $user)
    {
        if ($mail->archived_at != null) {
            return false;
        }

        $latest_mail_version = $mail->versions()->latest()->first();
        $latest_mail_version_transaction = MailTransaction::where('mail_version_id', $latest_mail_version->id)
            ->orderBy('id', 'desc')
            ->first();

        return $latest_mail_version_transaction->target_user_id == $user->getSameUser()->id;
    }

    public static function mailViewGate(Mail $mail, User $user)
    {
        $mail = (new UsersMailVersionRepository($user))->findMail($mail);

        if ($mail != false) {
            if ($mail->archived_at != null) {
                return false;
            }
        }

        return $mail != false;
    }
}
