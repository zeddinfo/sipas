<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessMailAttributeTransaction
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
        foreach ($event->request->mail_attributes as $mail_attribute_id) {
            $event->mail->attributes()->attach($mail_attribute_id);
        }
    }

    private function handleUpdated($event)
    {
        dd('Updated');
    }
}
