<?php

namespace App\Http\Controllers\User;

use App\Models\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailMasterController extends Controller
{
    public function show(Mail $mail)
    {
        $mail->load('attributes', 'logs');
        return view('mails.show')->with(compact('mail'));
    }
}
