<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Mail;
use App\Repositories\UsersMailRepository;
use App\Services\MailServices;
use Auth;
use Illuminate\Http\Request;
use Storage;

class MailDownloadController extends Controller
{
    public function download(Mail $mail)
    {
        abort_if(!MailServices::mailViewGate($mail, Auth::user()), 404);

        $mail = (new UsersMailRepository(Auth::user()))->findMail($mail);
        dd($mail);

        return redirect(Storage::url('files/' . $mail->versions()));
    }
}
