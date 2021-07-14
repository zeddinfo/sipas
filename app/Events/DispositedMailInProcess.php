<?php

namespace App\Events;

use App\Models\Mail;
use App\Models\MailTransaction;
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
    public $mail_transaction;
    public $event_type;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(MailTransaction $mail_transaction, Request $request)
    {
        $this->request = $request;
        $this->mail_transaction = $mail_transaction;
        $this->event_type = "DISPOSITED_MAIL_IN";
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
