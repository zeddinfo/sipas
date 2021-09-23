<?php

namespace App\Listeners;

use App\Mail\EmailNotifications;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->request->user();

        switch ($event->event_type) {
            case in_array($event->event_type, ['FORWARDED_MAIL_OUT', 'CREATED_MAIL_OUT', 'UPDATED_MAIL_OUT']):
                $this->sendEmailNotification("Perlu Tanggapan", "Surat Keluar", $user, $user->getUpperUser('out'));
                break;

            case in_array($event->event_type, ['FORWARDED_MAIL_IN', 'CREATED_MAIL_IN', 'UPDATED_MAIL_IN']):
                $this->sendEmailNotification("Perlu Tanggapan", "Surat Masuk", $user, $user->getUpperUser('in'));
                break;

            case 'DISPOSITED_MAIL_IN':
                $this->sendEmailNotification("Perlu Didisposisikan", "Surat Masuk", $user, User::find($event->mail_transaction->target_user_id));
                break;
        }
    }

    public function sendEmailNotification($type, $mail_type, User $user, $target_user = null)
    {
        $dummy = 'nurmanfiqri@gmail.com';
        $user = User::where('id', $target_user->id)->first();
        // dd($user);
        if (!empty($user) && !empty($user->email)) {
            $subject = [
                'title' => "Pemberitahuan " . $mail_type,
                'url' => "{{url('/login')}}",
                'mail_type' => $mail_type,
                'type' => $type,
                'name' => $user->name,
            ];

            Mail::to($user->email)->send(new EmailNotifications($subject));
        } else {
            ///do nothing like patrick
        }
    }
}
