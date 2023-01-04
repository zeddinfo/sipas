<?php

namespace App\Http\Controllers\Administration;

use Auth;
use App\Models\Mail;
use Illuminate\Http\Request;
use App\Models\MailAttribute;
use App\Services\MailServices;
use Illuminate\Support\Carbon;
use App\Models\MailTransaction;
use App\Http\Controllers\Controller;
use App\Events\FinalizedMailOutProcess;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\MailOutFinalRequest;
use App\Models\Department;

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

        $mail_attribute_types = MailAttribute::select('type')->distinct()->get();
        $all_mail_attributes = MailAttribute::all();
        $mail_attributes = [];

        foreach ($mail_attribute_types as $mail_attribute_type) {
            $mail_attributes[] =
                $all_mail_attributes->where('type', $mail_attribute_type->type);
        }

        $correction = MailTransaction::with('correction')->where([
            ['type', MailTransaction::TYPE_REVISION],
            ['target_user_id', Auth::user()->id]
        ])->first();

        $creator_level_department = $mail->logs[0]->user_level_department;
        $creator_department = explode('-', $creator_level_department);


        $creator_department = Department::where('name', $creator_department)->first();

        while ($creator_department != null) {
            $creator_department = $creator_department->upperDepartment()->first();
        }

        // Asign Mail Code if null based on mail indexes
        if ($mail->code == null) {
            $mail->code = $mail->attributes[0]->code . '/.../DINKES-' .  '/' . Carbon::now()->year;
        }

        return view('mails.finalitation')->with(compact('mail_attributes', 'mail', 'correction'));
    }

    public function update(MailOutFinalRequest $request, Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);

        $mail->type = Mail::TYPE_OUT;
        $mail->title = $request->title;
        $mail->instance = $request->instance;
        $mail->note = $request->note;
        $mail->code = $request->code;
        $mail->mail_created_at = $request->mail_created_at;
        $mail->archived_at = Carbon::now();
        $mail->save();

        event(new FinalizedMailOutProcess($mail, $request));

        Alert::success('Yay :D', 'Berhasil mengarsipkan surat');
        return redirect(route('tu.mail.out.index'));
    }

    public function destroy($id)
    {
        //
    }
}
