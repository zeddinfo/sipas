<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Mail;
use App\Repositories\UsersMailVersionRepository;
use App\Services\MailServices;
use Auth;
use Illuminate\Http\Request;
use Storage;

class MailDownloadController extends Controller
{
    public function download(Mail $mail)
    {
        abort_if(!MailServices::mailViewGate($mail, Auth::user()), 404);

        $users_mail_version = (new UsersMailVersionRepository(Auth::user()))->findMail($mail);

        return redirect($users_mail_version->file->directory_name);
    }
}
