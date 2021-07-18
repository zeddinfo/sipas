<?php

namespace App\Http\Controllers\User;

use App\Events\CreatedMailInProcess;
use App\Events\UpdatedMailInProcess;
use App\Http\Controllers\Controller;
use App\Http\Requests\MailInRequest;
use App\Models\Mail;
use App\Models\MailAttribute;
use App\Repositories\UsersMailRepository;
use Illuminate\Http\Request;

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
        dd($request->all());
        $mail = new Mail();
        $mail->type = Mail::TYPE_IN;
        $mail->title = $request->title;
        $mail->code = $request->code;
        $mail->instance = $request->instance;
        $mail->mail_created_at = $request->mail_created_at;
        $mail->save();

        event(new CreatedMailInProcess($mail, $request));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(MailInRequest $request, $id)
    {
        $mail = Mail::findOrFail($id);
        if ($mail->type != 'IN') {
            return abort(404, 'Anda tidak punya akses.');
        }

        ///akses cek?

        event(new UpdatedMailInProcess($mail, $request));
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
