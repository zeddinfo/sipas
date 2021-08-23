<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Http\Requests\MailOutFinalRequest;
use App\Models\Mail;
use App\Models\MailAttribute;
use App\Models\MailTransaction;
use App\Repositories\UsersMailRepository;
use App\Services\MailServices;
use Auth;
use Illuminate\Http\Request;

class MailOutController extends Controller
{
    public function index()
    {
        $title = "Surat Keluar";
        $icon = "bi-box-arrow-left";
        $table_view = "mails/tables/mail-out";

        $mail_repository = new UsersMailRepository();
        $mails = $mail_repository->getMails(Mail::TYPE_OUT);

        return view('mails.index', compact('title', 'icon', 'table_view', 'mails'));
    }

    public function show(Mail $mail)
    {
        abort_if(!MailServices::mailViewGate($mail, Auth::user()), 404);

        $mail->load('attributes', 'logs');

        return view('mails.show')->with(compact('mail'));
    }

    public function edit(MailOutFinalRequest $request, Mail $mail, $id)
    {
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
