<?php

namespace App\Utilities;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailNotifications;
use App\Models\User;

class SendEmailHelper
{
    public static function sendEmail($id_user, $title, $mail_type, $type)
    // { $email = $data->email;
    {
        $email_to = 'emailtujuan@hotmail.com';

        $user = User::where('id', $id_user)->first();

        if (!empty($user)) {
            $subject = [
                'title' => $title,
                'url' => 'www.dummy.com',
                'mail_type' => $mail_type,
                'type' => $type
            ];
            Mail::to($user)->send(new EmailNotifications($subject));
            return true;
        } else {
            return false;
        }
    }
}
