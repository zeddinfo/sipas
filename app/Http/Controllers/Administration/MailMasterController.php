<?php

namespace App\Http\Controllers\Administration;

use Carbon\Carbon;
use App\Models\Mail;
use Illuminate\Http\Request;
use App\Models\MailAttribute;
use App\Services\MailServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Events\UpdatedMailMasterProcess;
use App\Http\Requests\MailMasterRequest;
use RealRashid\SweetAlert\Facades\Alert;

class MailMasterController extends Controller
{
    public function index()
    {
        //
    }

    public function show(Mail $mail)
    {
        $mail->load('attributes', 'logs');
        return view('mails.show')->with(compact('mail'));
    }

    public function edit(Mail $mail)
    {
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

        return view('mails.edit')->with(compact('title', 'mail', 'mail_attributes'));
    }

    public function update(MailMasterRequest $request, Mail $mail)
    {
        $mail->title = $request->title;
        $mail->instance = $request->instance;
        $mail->note = $request->note;
        $mail->code = $request->code;
        $mail->mail_created_at = $request->mail_created_at;
        if ($mail->type == Mail::TYPE_IN) {
            $mail->mail_received_at = $request->mail_received_at;
        }
        $mail->save();

        event(new UpdatedMailMasterProcess($mail, $request));

        Alert::success('Yay :D', 'Berhasil mengubah surat');
        return redirect(request()->cookie('page'));
    }

    public function destroy(Mail $mail)
    {
        $mail->delete();

        Alert::success('Yay :D', 'Berhasil menghapus surat');
        return redirect()->back();
    }

    public function archive(Mail $mail)
    {
        $mail->archived_at = Carbon::now();
        $mail->save();
    }

    public function download(Mail $mail)
    {
        return redirect('storage/' . $mail->versions()->latest()->first()->file->directory_name);
    }
}
