<?php

namespace App\Events;

use App\Models\Mail;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Http\Request;

class FinalizedMailOutProcess
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $request;
    public $event_type;
    public $mail;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Mail $mail, Request $request)
    {
        $this->request = $request;
        $this->event_type = "FINALIZED_MAIL_OUT";
        $this->mail = $mail;
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
