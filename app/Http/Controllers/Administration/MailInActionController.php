<?php

namespace App\Http\Controllers\Administration;

use Carbon\Carbon;
use App\Models\Mail;
use Illuminate\Http\Request;
use App\Services\MailServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MailInActionController extends Controller
{
    public function archive(Mail $mail)
    {
        abort_if(!MailServices::mailViewGate($mail, Auth::user()), 404);

        $mail->archived_at = Carbon::now();
        $mail->save();

        Alert::success('Yay :D', 'Berhasil mengarsipkan surat');
        return redirect(route('tu.mail.in.index'));
    }
}
