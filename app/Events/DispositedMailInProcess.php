<?php

namespace App\Events;

use App\Models\Mail;
use App\Models\MailTransaction;
use App\Utilities\SendEmailHelper;
use Illuminate\Http\Request;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class DispositedMailInProcess
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $request;
    public $event_type;
    public $mail;
    public $mail_transaction;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(MailTransaction $mail_transaction, Request $request)
    {
        $this->request = $request;
        $this->event_type = "DISPOSITED_MAIL_IN";
        $this->mail = $mail_transaction->mailVersion->mail;
        $this->mail_transaction = $mail_transaction;

        $MailNotification = new SendEmailHelper();
        $MailNotification::sendEmail($mail_transaction->target_user_id, "Pemberitahuan", "Surat Masuk", "Disposisi");
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
