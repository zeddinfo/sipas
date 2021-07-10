<?php

namespace App\Http\Controllers\User;

use App\Events\RevisedMailOutProcess;
use App\Http\Controllers\Controller;
use App\Http\Requests\MailRevisionRequest;
use App\Models\Mail;
use App\Models\MailTransactionCorrection;
use App\Services\MailServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MailOutRevisionController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Mail $mail)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);
    }


    public function store(Mail $mail, MailRevisionRequest $request)
    {
        abort_if(!MailServices::mailActionGate($mail, Auth::user()), 404);

        event(new RevisedMailOutProcess($mail, $request));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
