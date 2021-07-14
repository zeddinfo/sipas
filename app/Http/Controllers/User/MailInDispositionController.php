<?php

namespace App\Http\Controllers\User;

use App\Events\DispositedMailInProcess;
use App\Events\DispositionMailIn;
use App\Http\Controllers\Controller;
use App\Http\Requests\DispositionRequest;
use App\Http\Requests\MailInForwardRequest;
use App\Models\Mail;
use App\Models\MailTransaction;
use App\Models\MailTransactionMemo;
use App\Models\User;
use App\Services\MailServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MailTransactions;

class MailInDispositionController extends Controller
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
        abort_if(!MailServices::mailActionGate($mail, Auth::user()) || !Auth::user()->hasDisposition(), 404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DispositionRequest $request, Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user())
            || !Auth::user()->hasDisposition()
            || !Auth::user()->checkLowerUserIds($request->target_user_ids), 404);

        $target_user_ids = $request->target_user_ids;

        foreach ($target_user_ids as $target_user_id) {
            $mail_transaction = new MailTransaction();
            $mail_transaction->mail_version_id = $mail->versions()->orderBy('id', 'DESC')->first()->id;
            $mail_transaction->user_id = Auth::user()->id;
            $mail_transaction->target_user_id = $target_user_id;
            $mail_transaction->type = MailTransaction::TYPE_DISPOSITION;
            $mail_transaction->save();

            event(new DispositedMailInProcess($mail_transaction, $request));
        }
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
