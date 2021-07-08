<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Mail;
use Illuminate\Http\Request;

class UpdatedMailOutProcess
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $mail;
    public $request;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Mail $mail, Request $request)
    {
        $this->mail = $mail;
        $this->request = $request;
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
