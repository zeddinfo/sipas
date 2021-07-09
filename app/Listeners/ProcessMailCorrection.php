<?php

namespace App\Listeners;

use App\Models\MailTransactionCorrection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessMailCorrection
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
        $mail_transaction_correction = new MailTransactionCorrection();
        $mail_transaction_correction->mail_transaction_id = $event->mail_transaction->id;
        $mail_transaction_correction->file_id = $event->file?->id;
        $mail_transaction_correction->note = $event->request->note;
        $mail_transaction_correction->save();
    }
}
