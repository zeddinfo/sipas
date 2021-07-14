<?php

namespace App\Listeners;

use App\Models\MailTransactionMemo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessMailTransactionMemo
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
        $mail_transaction_memo = new MailTransactionMemo();
        $mail_transaction_memo->mail_transaction_id = $event->mail_transaction->id;
        $mail_transaction_memo->memo = $event->request->memo;
        $mail_transaction_memo->save();
    }
}
