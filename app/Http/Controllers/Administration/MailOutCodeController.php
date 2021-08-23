<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Http\Requests\MailOutCodeRequest;
use App\Models\Mail;
use Illuminate\Http\Request;

class MailOutCodeController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Mail $mail)
    {
        //
    }

    public function store(MailOutCodeRequest $request, Mail $mail)
    {
    }

    public function show($id)
    {
        //
    }

    public function edit(Mail $mail)
    {
        //
    }

    public function update(MailOutCodeRequest $request, Mail $mail)
    {
        $mail->update($request->validated());
    }

    public function destroy($id)
    {
        //
    }
}
