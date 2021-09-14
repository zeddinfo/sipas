<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailNotifications extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('EmailNotifications')
            ->subject('Pemberitahuan Penting!')
            ->with('data', $this->data);
        // ->attach(public_path('/img/a.png'), [
        //     'as'    => 'a.png',
        //     'mime'  => 'image/png',
        // ]);
    }
}
