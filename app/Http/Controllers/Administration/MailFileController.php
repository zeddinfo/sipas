<?php

namespace App\Http\Controllers\Administration;

use App\Models\Mail;
use Illuminate\Http\Request;
use App\Services\MailServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UsersMailVersionRepository;
use App\Services\FileServices;

class MailFileController extends Controller
{
    public function show(Mail $mail)
    {
        $latest_mail_version = $mail->versions()->orderBy('id', 'DESC')->first();

        return redirect(FileServices::extensionAdapter($latest_mail_version->file));
    }
}
