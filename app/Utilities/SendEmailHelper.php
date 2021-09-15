<?php

namespace App\Utilities;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailNotifications;
use App\Models\User;

class SendEmailHelper
{
    public static function sendEmail($id_user, $title, $mail_type, $type)
    {

        // $user = User::where('id', $id_user)->first();

        // $subject = [
        //     'title' => $title,
        //     'url' => "{{url('/login'}}",
        //     'mail_type' => $mail_type,
        //     'type' => $type,
        //     'name' => "Nurman Fiqri S"
        // ];
        // Mail::to($user->email)->send(new EmailNotifications($subject));
        return true;

        // if (!empty($user)) {
        //     $subject = [
        //         'title' => $title,
        //         'url' => 'www.dummy.com',
        //         'mail_type' => $mail_type,
        //         'type' => $type
        //     ];
        //     Mail::to($email_to)->send(new EmailNotifications($subject));
        //     return true;
        // } else {
        //     return false;
        // }
    }
}
