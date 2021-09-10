<?php

namespace App\Http\Controllers\User;

use App\Models\Mail;
use Illuminate\Http\Request;
use App\Services\FileServices;
use App\Services\MailServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UsersMailVersionRepository;

class MailFileController extends Controller
{
    public function show(Mail $mail)
    {
        if (Auth::user()->hasAllMailAccess()) {
            $latest_mail_version = $mail->versions()->orderBy('id', 'DESC')->first();
            return redirect(FileServices::extensionAdapter($latest_mail_version->file));
        }

        abort_if(!MailServices::mailViewGate($mail, Auth::user()), 404);

        $users_mail_version = (new UsersMailVersionRepository(Auth::user()))->findMail($mail);

        return redirect(FileServices::extensionAdapter($users_mail_version->file));
    }
}
