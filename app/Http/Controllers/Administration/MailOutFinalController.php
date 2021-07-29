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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Mail $mail)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MailOutFinalRequest $request, Mail $mail)
    {
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
    public function edit(Mail $mail)
    {

        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);

        $page = 'Finalisasi Surat';

        $mail = Mail::with('attributes')->where('id', $mail->id)->first();
        $sifat = MailAttribute::get()->where('type', 'Sifat');
        $tipe = MailAttribute::get()->where('type', 'Tipe');
        $prioritas = MailAttribute::get()->where('type', 'Prioritas');
        $folder = MailAttribute::get()->where('type', 'Folder');

        $correction = MailTransaction::with('correction')->where([
            ['type', MailTransaction::TYPE_REVISION],
            ['target_user_id', Auth::user()->id]
        ])->first();

        return view('mails.finalitation')->with(compact('page', 'sifat', 'tipe', 'prioritas', 'folder', 'mail', 'correction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MailOutFinalRequest $request, Mail $mail)
    {

        $mail->update($request->validated());

        $mail->attributes()->detach();

        foreach ($request->mail_attributes as $mail_attribute_id) {
            $mail->attributes()->attach($mail_attribute_id);
        }
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
