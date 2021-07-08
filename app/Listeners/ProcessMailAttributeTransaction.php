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
        $event->mail->attributes()->detach();

        foreach ($event->request->mail_attributes as $mail_attribute_id) {
            $event->mail->attributes()->attach($mail_attribute_id);
        }
    }

    private function handleCreated($event)
    {
    }

    private function handleUpdated($event)
    {
    }
}
