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
        abort_if(!MailServices::mailViewGate($mail, Auth::user()), 404);

        $users_mail_version = (new UsersMailVersionRepository(Auth::user()))->findMail($mail);

        return redirect(FileServices::extensionAdapter($users_mail_version->file));
    }
}
