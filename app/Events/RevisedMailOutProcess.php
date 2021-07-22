<?php

namespace App\Events;

use App\Models\Mail;
use App\Models\MailTransaction;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class RevisedMailOutProcess
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
        $this->event_type = "REVISED_MAIL_OUT";
        $this->request = $request;
        $this->mail = $mail_transaction->mailVersion->mail;
        $this->mail_transaction = $mail_transaction;
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
