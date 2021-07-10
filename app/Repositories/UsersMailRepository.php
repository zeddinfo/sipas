<?php

namespace App\Repositories;

use App\Models\Mail;
use App\Models\MailVersion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersMailRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        return MailVersion::whereHas('mailTransactions', function ($query) {
            $query->where('user_id', $this->user->getSameUser()->id)
                ->orWhere('target_user_id', $this->user->getSameUser()->id);
        })->orderBy('id', 'desc')->get();
    }

    public function findMail(Mail $mail)
    {
        $mails = $this->all();
        foreach ($mails as $key => $value) {
            if ($mail->id == $value->mail_id) {
                return $value;
            }
        }
        return false;
    }
}
