<?php

namespace App\Listeners;

use App\Models\MailTransaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessMailTransaction
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

        switch (true) {

            case in_array($event->event_type, ['CREATED_MAIL_OUT', 'UPDATED_MAIL_OUT', 'FORWARDED_MAIL_OUT']):
                $mail_transaction_mail_version_id = $event->mail_version->id;
                $mail_transaction_target_user_id = $user->getUpperUser('out')->id;
                $mail_transaction_type = "FORWARD";
                break;

            case $event->event_type == 'REVISED_MAIL_OUT':
                $mail_transaction_mail_version_id = $event->mail->id;
                $mail_transaction_target_user_id = $user->getSameUser()->targetMailTransactions()->where('mail_version_id', $event->mail->id)->first()->user_id;
                $mail_transaction_type = "REVISION";
                break;
        }


        $mail_transaction = new MailTransaction();
        $mail_transaction->user_id = $user->id;
        $mail_transaction->target_user_id = $mail_transaction_target_user_id;
        $mail_transaction->mail_version_id = $mail_transaction_mail_version_id;
        $mail_transaction->type = $mail_transaction_type;
        $mail_transaction->save();

        $event->mail_transaction = $mail_transaction;
    }
}
