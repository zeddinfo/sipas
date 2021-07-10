<?php

namespace App\Repositories;

use App\Models\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersMailRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        return Mail::whereHas('versions.mailTransactions', function ($query) {
            $query->where('user_id', $this->user->getSameUser()->id)
                ->orWhere('target_user_id', $this->user->getSameUser()->id);
        })
            ->with([
                'versions'
            ])
            ->get();
    }

    public function findMail(Mail $mail)
    {
        $mails = $this->all();
        foreach ($mails as $key => $value) {
            if ($mail->id == $value->id) {
                return $value;
            }
        }
        return false;
    }
}
