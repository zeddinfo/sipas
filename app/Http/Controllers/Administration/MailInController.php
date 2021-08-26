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
        $title = 'Tambah Surat Masuk';

        $mail_attribute_types = MailAttribute::select('type')->distinct()->get();
        $all_mail_attributes = MailAttribute::all();
        $mail_attributes = [];

        foreach ($mail_attribute_types as $mail_attribute_type) {
            $mail_attributes[] =
                $all_mail_attributes->where('type', $mail_attribute_type->type);
        }

        $mail_type = Mail::TYPE_IN;

        return view('mails.create')->with(compact('title', 'mail_attributes', 'mail_type'));
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
