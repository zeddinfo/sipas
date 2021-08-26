<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Http\Requests\MailOutFinalRequest;
use App\Models\Mail;
use App\Models\MailAttribute;
use App\Models\MailTransaction;
use App\Services\MailServices;
use Auth;
use Illuminate\Http\Request;

class MailOutFinalController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Mail $mail)
    {
        //
    }

    public function store(MailOutFinalRequest $request, Mail $mail)
    {
    }

    public function show($id)
    {
        //
    }

    public function edit(Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);
        $mail = Mail::with('attributes')->where('id', $mail->id)->first();
        $sifat = MailAttribute::get()->where('type', 'Sifat');
        $tipe = MailAttribute::get()->where('type', 'Tipe');
        $prioritas = MailAttribute::get()->where('type', 'Prioritas');
        $folder = MailAttribute::get()->where('type', 'Folder');

        $correction = MailTransaction::with('correction')->where([
            ['type', MailTransaction::TYPE_REVISION],
            ['target_user_id', Auth::user()->id]
        ])->first();

        // Asign Mail Code if null based on mail indexes
        if ($mail->code == null) {
            $mail->code = 'Testing 123';
        }

        if ($mail->directory_code == null) {
            $mail->directory_code = 'Testing ABC';
        }

        return view('mails.finalitation')->with(compact('sifat', 'tipe', 'prioritas', 'folder', 'mail', 'correction'));
    }

    public function update(MailOutFinalRequest $request, Mail $mail)
    {
        // $mail->update($request->validated());
        // dd($request->all());

        $mail->attributes()->detach();

        foreach ($request->mail_attributes as $mail_attribute_id) {
            // dd('masuk');
            $mail->attributes()->attach($mail_attribute_id);
        }
    }

    public function destroy($id)
    {
        //
    }
}
