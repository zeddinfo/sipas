<?php

namespace App\Http\Controllers\User;

use App\Events\CreatedMailOutProcess;
use App\Events\UpdatedMailOutProcess;
use App\Http\Controllers\Controller;
use App\Http\Requests\MailOutRequest;
use App\Models\Mail;
use App\Models\MailAttribute;
use App\Models\MailTransaction;
use App\Repositories\UsersMailRepository;
use App\Services\MailServices;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

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


    public function create()
    {
        $title = 'Tambah Surat Keluar';

        $mail_attribute_types = MailAttribute::select('type')->distinct()->get();
        $all_mail_attributes = MailAttribute::all();
        $mail_attributes = [];

        foreach ($mail_attribute_types as $mail_attribute_type) {
            $mail_attributes[] =
                $all_mail_attributes->where('type', $mail_attribute_type->type);
        }

        $mail_type = Mail::TYPE_OUT;

        return view('mails.create')->with(compact('title', 'mail_attributes', 'mail_type'));
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

        Alert::success('Yay :D', 'Berhasil membuat dan meneruskan surat');
        return redirect(route('user.mail.out.index'));
    }

    public function show(Mail $mail)
    {
        abort_if(!MailServices::mailViewGate($mail, Auth::user()), 404);

        $mail->load('attributes', 'logs');

        return view('mails.show')->with(compact('mail'));
    }

    public function edit(Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);

        $title = 'Ubah';

        $mail = Mail::with('attributes')->where('id', $mail->id)->first();

        $mail_attribute_types = MailAttribute::select('type')->distinct()->get();
        $all_mail_attributes = MailAttribute::all();
        $mail_attributes = [];

        foreach ($mail_attribute_types as $mail_attribute_type) {
            $mail_attributes[] =
                $all_mail_attributes->where('type', $mail_attribute_type->type);
        }

        $mail_transaction = Auth::user()->targetMailTransactions()->whereHas('mailVersion.mail', function ($query) use ($mail) {
            $query->where('id', $mail->id);
        })->orderBy('id')->get();

        $correction = $mail_transaction->last()?->correction;

        return view('mails.partials.correction')->with(compact('title', 'mail', 'mail_attributes', 'correction'));
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

        Alert::success('Yay :D', 'Berhasil menyimpan surat');
        return redirect(route('user.mail.out.index'));
    }

    public function destroy(Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);
        $mail->delete();
    }
}
