<?php

namespace App\Utilities;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailNotifications;

class SendEmailHelper
{
    public static function sendEmail($data)
    // { $email = $data->email;
    {
        $email_to = 'emailtujuan@hotmail.com';
        $subject = [
            'title' => "Pemberitahuan",
            'url' => 'www.dummy.com',
        ];
        Mail::to($email_to)->send(new EmailNotifications($subject));
        return true;
    }
}
