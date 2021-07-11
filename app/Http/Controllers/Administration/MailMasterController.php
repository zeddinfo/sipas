<?php

namespace App\Http\Controllers\Administration;

use App\Events\UpdatedMailMasterProcess;
use App\Http\Controllers\Controller;
use App\Http\Requests\MailMasterRequest;
use App\Models\Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MailMasterController extends Controller
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
     * Display the specified resource.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function show(Mail $mail)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function edit(Mail $mail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function update(MailMasterRequest $request, Mail $mail)
    {
        $request->validated();
        $mail->update([
            'title' => $request->title,
            'code' => $request->code,
            'directory_code' => $request->directory_code,
            'instance' => $request->instance,
            'mail_created_at' => $request->mail_created_at,
        ]);

        event(new UpdatedMailMasterProcess($mail, $request));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mail $mail)
    {
        $mail->delete();
    }

    public function archive(Mail $mail)
    {
        $mail->archived_at = Carbon::now();
        $mail->save();
    }

    public function download(Mail $mail)
    {
        return redirect($mail->versions()->latest()->first()->file->directory_name);
    }
}
