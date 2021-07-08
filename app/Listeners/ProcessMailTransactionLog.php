<?php

namespace App\Listeners;

use App\Models\MailTransactionLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessMailTransactionLog
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
        if ($event->request->method() === 'POST') {
            $this->handleCreated($event);
        } elseif ($event->request->method() === 'PATCH') {
            $this->handleUpdated($event);
        }
    }

    private function handleCreated($event)
    {
        $user = $event->request->user();

        $mail_transaction_log = new MailTransactionLog();
        $mail_transaction_log->mail_transaction_id = $event->mail_transaction->id;
        $mail_transaction_log->log = "Dibuat oleh ";
        $mail_transaction_log->user_name = $user->name;
        $mail_transaction_log->user_level_department = $user->level?->name . " " . $user->department?->name;
        $mail_transaction_log->save();

        $event->mail_transaction_log = $mail_transaction_log;
    }

    private function handleUpdated($event)
    {
    }
}
