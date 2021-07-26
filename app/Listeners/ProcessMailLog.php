<?php

namespace App\Listeners;

use App\Models\MailLog;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use MailTransactions;

class ProcessMailLog
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
        $user = $event->request->user();

        switch ($event->event_type) {
            case 'CREATED_MAIL_OUT':
                $this->createLog(MailLog::LOG_CREATED, $event, $user);
                $this->createLog(MailLog::LOG_FORWARDED, $event, $user, $user->getUpperUser('out'));
                break;

            case 'UPDATED_MAIL_OUT':
                $this->createLog(MailLog::LOG_UPDATED, $event, $user);
                $this->createLog(MailLog::LOG_FORWARDED, $event, $user, $user->getUpperUser('out'));
                break;

            case 'FORWARDED_MAIL_OUT':
                $this->createLog(MailLog::LOG_FORWARDED, $event, $user, $user->getUpperUser('out'));
                break;

            case 'REVISED_MAIL_OUT':
                $this->createLog(MailLog::LOG_REVISED, $event, $user, User::find($event->mail_transaction->target_user_id));
                break;

            case 'DISPOSITED_MAIL_IN':
                $this->createLog(MailLog::LOG_DISPOSITED, $event, $user, User::find($event->mail_transaction->target_user_id));
                break;

            case 'CREATED_MAIL_IN':
                $this->createLog(MailLog::LOG_CREATED, $event, $user);
                $this->createLog(MailLog::LOG_FORWARDED, $event, $user, User::find($event->mail_transaction->target_user_id));
                break;

            case 'FORWARDED_MAIL_IN':
                $this->createLog(MailLog::LOG_FORWARDED, $event, $user, User::find($event->mail_transaction->target_user_id));
                break;

            case 'UPDATED_MAIL_MASTER':
                $this->createLog(MailLog::LOG_UPDATED, $event, $user);
                break;

            default:
                # code...
                break;
        }
    }

    public function createLog($log, $event, User $user, User $target_user = null)
    {
        $mail_log = new MailLog();
        $mail_log->mail_id = $event->mail->id;
        $mail_log->log = $log;
        $mail_log->user_name = $user->name;
        $mail_log->user_level_department = $user->getLevelDepartment();
        $mail_log->target_user_name = $target_user?->name;
        $mail_log->target_user_level_department = $target_user?->getLevelDepartment();
        $mail_log->save();
    }
}
