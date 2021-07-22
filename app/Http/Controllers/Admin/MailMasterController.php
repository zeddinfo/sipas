<?php

namespace App\Http\Controllers\Admin;

use App\Events\UpdatedMailMasterProcess;
use App\Http\Controllers\Controller;
use App\Http\Requests\MailMasterRequest;
use App\Models\Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MailMasterController extends Controller
{
    public function index()
    {
        //
    }

    public function show(Mail $mail)
    {
    }

    public function edit(Mail $mail)
    {
        //
    }

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
