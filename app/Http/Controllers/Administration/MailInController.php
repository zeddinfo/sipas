<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Events\CreatedMailInProcess;
use App\Http\Requests\MailInRequest;
use App\Http\Requests\UserRequest;
use App\Models\Mail;
use App\Models\MailAttribute;
use App\Models\MailAttributeTransaction;
use App\Repositories\UsersMailRepository;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MailInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = "Masuk";
        $mail_repository = new UsersMailRepository();

        $mail_kind = Mail::TYPE_IN;
        $mails = $mail_repository->getMails($mail_kind);
        // dd($mails);

        return view('mails.index', compact('page', 'mail_kind', 'mails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = 'Buat Surat Masuk';
        $sifat = MailAttribute::get()->where('type', 'Sifat');
        $tipe = MailAttribute::get()->where('type', 'Tipe');
        $prioritas = MailAttribute::get()->where('type', 'Prioritas');
        $folder = MailAttribute::get()->where('type', 'Folder');
        return view('mails.create')->with(compact('page', 'sifat', 'tipe', 'prioritas', 'folder'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mails = Mail::get()->where('id', $id);
        $mails_attributes = MailAttribute::get();
        $mails_attributes_transaction = MailAttributeTransaction::get()->where('mail_id', $id);
        return view('mails.show')->with(compact('mails', 'mails_attributes', 'mails_attributes_transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
