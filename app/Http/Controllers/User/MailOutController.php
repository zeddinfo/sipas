<?php

namespace App\Http\Controllers\User;

use App\Events\CreatedMailOutProcess;
use App\Events\UpdatedMailOutProcess;
use App\Http\Controllers\Controller;
use App\Http\Requests\MailOutRequest;
use App\Models\Mail;
use App\Services\MailServices;
use Auth;
use Illuminate\Http\Request;

class MailOutController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function store(MailOutRequest $request)
    {
        $mail = new Mail();
        $mail->type = Mail::TYPE_OUT;
        $mail->title = $request->title;
        $mail->instance = $request->instance;
        $mail->mail_created_at = $request->mail_created_at;
        $mail->save();

        event(new CreatedMailOutProcess($mail, $request));
    }

    public function show(Mail $mail)
    {
        //
    }

    public function edit(Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);
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
