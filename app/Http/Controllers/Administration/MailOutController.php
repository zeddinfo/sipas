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
        $page = "Keluar";
        $mail_repository = new UsersMailRepository();

        $mail_type = Mail::TYPE_OUT;
        $mails = $mail_repository->getMails($mail_type);

        return view('mails.index', compact('page', 'mail_type', 'mails'));
    }

    public function show($id)
    {
        //
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
