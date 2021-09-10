<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mail;
use Illuminate\Http\Request;
use App\Services\FileServices;
use App\Services\MailServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MailFileController extends Controller
{
    public function show(Mail $mail)
    {
        $latest_mail_version = $mail->versions()->orderBy('id', 'DESC')->first();

        return redirect(FileServices::extensionAdapter($latest_mail_version->file));
    }
}
