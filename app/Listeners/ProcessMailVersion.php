<?php

namespace App\Listeners;

use App\Models\MailVersion;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessMailVersion
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
        if ($event->event_type == 'UPDATED_MAIL_MASTER') {
            $mail_version_id = $event->mail->versions()->orderBy('id', 'DESC')->first()->id;
            $mail_version = MailVersion::findOrFail($mail_version_id);
            $mail_version->file_id = $event->file->id;
            $mail_version->save();
        } else {
            $mail_version = MailVersion::create([
                'mail_id' => $event->mail->id,
                'file_id' => $event->file->id
            ]);
        }

        $event->mail_version = $mail_version;
    }
}
