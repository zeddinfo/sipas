<?php

namespace App\Events;

use App\Models\Mail;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class UpdatedMailMasterProcess
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $mail;
    public $request;
    public $file;
    public $mail_version;
    public $mail_transaction_log;
    public $event_type;

    public function __construct(Mail $mail, Request $request)
    {
        $this->event_type = "UPDATED_MAIL_MASTER";
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
