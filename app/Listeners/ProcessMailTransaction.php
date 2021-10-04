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

        switch (true) {
            case in_array($event->event_type, ['CREATED_MAIL_OUT', 'UPDATED_MAIL_OUT', 'FINALIZED_MAIL_OUT']):
                $this->handleCreatedUpdatedMailOut($event);
                break;

            case $event->event_type == 'REVISED_MAIL_OUT':
                $this->handleRevisedMailOut($event);
                break;

            case $event->event_type = 'CREATED_MAIL_IN':
                $this->handleCreatedMailIn($event);
                break;

            case $event->event_type = 'DISPOSITED_MAIL_IN':
                $this->handleDispositionMailIn($event);
                break;
        }
    }


    public function handleCreatedUpdatedMailOut($event)
    {
        $user = $event->request->user();

        $mail_transaction = new MailTransaction();
        $mail_transaction->user_id = $user->id;
        $mail_transaction->target_user_id = $user->getUpperUser('out')->id;
        $mail_transaction->mail_version_id = $event->mail_version->id;
        $mail_transaction->type = MailTransaction::TYPE_FORWARD;
        $mail_transaction->save();

        $event->mail_transaction = $mail_transaction;
    }

    public function handleRevisedMailOut($event)
    {
        $user = $event->request->user();
        $mail_transaction = new MailTransaction();
        $mail_transaction->user_id = $user->id;
        $mail_transaction->target_user_id = $user->getSameUser()->targetMailTransactions()->where('mail_version_id', $event->mail->id)->first()->user_id;
        $mail_transaction->mail_version_id = $event->mail->versions()->orderBy('id', 'DESC')->first()->id;
        $mail_transaction->type = MailTransaction::TYPE_REVISION;
        $mail_transaction->save();

        $event->mail_transaction = $mail_transaction;
    }


    public function handleCreatedMailIn($event)
    {
        $user = $event->request->user();
        $lower_users = $user->getLowerUsers('in')->first();


        $mail_transaction = new MailTransaction();
        $mail_transaction->user_id = $user->id;
        $mail_transaction->target_user_id = $lower_users->id;
        $mail_transaction->mail_version_id = $event->mail_version->id;
        $mail_transaction->type = MailTransaction::TYPE_FORWARD;
        $mail_transaction->save();

        $event->mail_transaction = $mail_transaction;
    }

    public function handleDispositionMailIn($event)
    {
        $user = $event->request->user();

        $mail_transaction = new MailTransaction();
        $mail_transaction->user_id = $user->id;
        $mail_transaction->target_user_id = $user->ids;
        $mail_transaction->mail_version_id = $event->mail->versions()->orderBy('id', 'DESC')->first()->id;
        $mail_transaction->type = "";
        $mail_transaction->save();

        $event->mail_transaction = $mail_transaction;
    }
}
