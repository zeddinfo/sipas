<?php

namespace App\Services;

use App\Models\Mail;
use App\Models\MailTransaction;
use App\Models\User;

class MailServices
{
    public static function mailActionGate(Mail $mail, User $user)
    {
        $latest_mail_version = $mail->versions()->latest()->first();
        $latest_mail_version_transaction = MailTransaction::where('mail_version_id', $latest_mail_version->id)
            ->orderBy('id', 'desc')
            ->first();
        return $latest_mail_version_transaction->target_user_id == $user->id;
    }
}
