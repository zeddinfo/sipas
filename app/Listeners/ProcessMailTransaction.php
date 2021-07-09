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
        // if ($event->request->method() === 'POST') {
        //     $this->handleCreated($event);
        // } elseif ($event->request->method() === 'PATCH') {
        //     $this->handleUpdated($event);
        // }

        $user = $event->request->user();

        $mail_transaction = new MailTransaction();
        $mail_transaction->user_id = $user->id;
        $mail_transaction->target_user_id = $user->getUpperUser('out')->id;
        $mail_transaction->mail_version_id = $event->mail_version->id;
        $mail_transaction->type = "FORWARD";
        $mail_transaction->save();

        $event->mail_transaction = $mail_transaction;
    }

    private function handleCreated($event)
    {
    }

    private function handleUpdated($event)
    {
    }
}
