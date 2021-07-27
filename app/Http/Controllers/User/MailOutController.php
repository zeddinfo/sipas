<?php

namespace App\Http\Controllers\User;

use App\Events\CreatedMailOutProcess;
use App\Events\UpdatedMailOutProcess;
use App\Http\Controllers\Controller;
use App\Http\Requests\MailOutRequest;
use App\Models\Mail;
use App\Models\MailAttribute;
use App\Repositories\UsersMailRepository;
use App\Services\MailServices;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MailOutController extends Controller
{

    public function index()
    {
        $page = "Keluar";
        $mail_repository = new UsersMailRepository();

        $mail_kind = Mail::TYPE_OUT;
        $mails = $mail_repository->getMails($mail_kind);

        return view('mails.index', compact('page', 'mail_kind', 'mails'));
    }


    public function create()
    {
        $page = 'Tambah Surat Keluar';

        $sifat = MailAttribute::get()->where('type', 'Sifat');
        $tipe = MailAttribute::get()->where('type', 'Tipe');
        $prioritas = MailAttribute::get()->where('type', 'Prioritas');
        $folder = MailAttribute::get()->where('type', 'Folder');

        $mail_kind = Mail::TYPE_OUT;

        return view('mails.create')->with(compact('page', 'sifat', 'tipe', 'prioritas', 'folder', 'mail_kind'));
    }

    public function store(MailOutRequest $request)
    {
        $mail = new Mail();
        $mail->type = Mail::TYPE_OUT;
        $mail->title = $request->title;
        $mail->code = $request->code;
        $mail->directory_code = $request->directory_code;
        $mail->instance = $request->instance;
        $mail->mail_created_at = $request->mail_created_at;
        $mail->save();

        event(new CreatedMailOutProcess($mail, $request));

        Alert::success('Yay :D', 'Berhasil menyimpan Department');
        return redirect(route('user.mail.out.index'));
    }

    public function show(Mail $mail)
    {
        //
    }

    public function edit(Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);

        $page = 'Koreksi Surat Keluar';

        $mail = Mail::with('attributes')->where('id', $mail->id)->first();
        $sifat = MailAttribute::get()->where('type', 'Sifat');
        $tipe = MailAttribute::get()->where('type', 'Tipe');
        $prioritas = MailAttribute::get()->where('type', 'Prioritas');
        $folder = MailAttribute::get()->where('type', 'Folder');

        return view('mails.partials.correction')->with(compact('page', 'sifat', 'tipe', 'prioritas', 'folder', 'mail'));
    }

    public function update(MailOutRequest $request, Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);

        $mail->type = Mail::TYPE_OUT;
        $mail->title = $request->title;
        $mail->instance = $request->instance;
        $mail->mail_created_at = $request->mail_created_at;
        $mail->save();

        event(new UpdatedMailOutProcess($mail, $request));
    }

    public function destroy(Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);
        $mail->delete();
    }
}
