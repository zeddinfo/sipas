<?php

namespace App\Http\Controllers\Administration;

use App\Models\Mail;
use Illuminate\Http\Request;
use App\Models\MailAttribute;
use App\Services\MailServices;
use App\Http\Requests\UserRequest;
use App\Events\CreatedMailInProcess;
use App\Http\Controllers\Controller;
use App\Http\Requests\MailInRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\MailAttributeTransaction;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\UsersMailRepository;

class MailInController extends Controller
{
    public function index()
    {
        $title = "Surat Masuk";
        $icon = "bi-box-arrow-in-left";
        $table_view = "mails/tables/mail-in";

        $mail_repository = new UsersMailRepository();
        $mails = $mail_repository->getMails(Mail::TYPE_IN);

        return view('mails.index', compact('title', 'icon', 'table_view', 'mails'));
    }

    public function create()
    {
        $page = 'Tambah Surat Masuk';

        $sifat = MailAttribute::get()->where('type', 'Sifat');
        $tipe = MailAttribute::get()->where('type', 'Tipe');
        $prioritas = MailAttribute::get()->where('type', 'Prioritas');
        $folder = MailAttribute::get()->where('type', 'Folder');
        $mail_type = "IN";

        return view('mails.create')->with(compact('page', 'sifat', 'tipe', 'prioritas', 'folder', 'mail_type'));
    }

    public function store(MailInRequest $request)
    {
        $mail = new Mail();
        $mail->type = Mail::TYPE_IN;
        $mail->title = $request->title;
        $mail->code = $request->code;
        $mail->directory_code = $request->directory_code;
        $mail->instance = $request->instance;
        $mail->mail_created_at = $request->mail_created_at;
        $mail->save();

        event(new CreatedMailInProcess($mail, $request));

        Alert::success('Yay :D', 'Berhasil menyimpan Department');
        return redirect(route('tu.mail.in.index'));
    }

    public function show(Mail $mail)
    {
        abort_if(!MailServices::mailViewGate($mail, Auth::user()), 404);

        $mail->load('attributes', 'logs');

        return view('mails.show')->with(compact('mail'));
    }

    public function edit($id)
    {
        //
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
