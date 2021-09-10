<?php

namespace App\Providers;

use App\Events\CreatedMailInProcess;
use App\Events\CreatedMailOutProcess;
use App\Events\DispositedMailInProcess;
use App\Events\FinalizedMailOutProcess;
use App\Events\ForwardedMailOut;
use App\Events\RevisedMailOutProcess;
use App\Events\UpdatedMailMasterProcess;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\ProcessMailFile;
use App\Listeners\ProcessMailAttributeTransaction;
use App\Listeners\ProcessMailLog;
use App\Listeners\ProcessMailTransaction;
use App\Listeners\ProcessMailVersion;
use App\Listeners\SendNotification;
use App\Events\UpdatedMailOutProcess;
use App\Listeners\ProcessMailCorrection;
use App\Events\ForwardedMailIn;
use App\Events\ForwardedMailInProcess;
use App\Listeners\ProcessMailTransactionMemo;
use App\Listeners\ProcessRevisionFile;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        CreatedMailOutProcess::class => [
            ProcessMailAttributeTransaction::class,
            ProcessMailFile::class,
            ProcessMailVersion::class,
            ProcessMailTransaction::class,
            ProcessMailLog::class,
            // SendNotification::class,
        ],

        UpdatedMailOutProcess::class => [
            ProcessMailAttributeTransaction::class,
            ProcessMailFile::class,
            ProcessMailVersion::class,
            ProcessMailTransaction::class,
            ProcessMailLog::class,
            // SendNotification::class,
        ],

        FinalizedMailOutProcess::class => [
            ProcessMailAttributeTransaction::class,
            ProcessMailFile::class,
            ProcessMailVersion::class,
            ProcessMailLog::class,
            // SendNotification::class,
        ],

        ForwardedMailOut::class => [
            ProcessMailLog::class
            // SendNotification::class,
        ],

        RevisedMailOutProcess::class => [
            ProcessRevisionFile::class,
            ProcessMailCorrection::class,
            ProcessMailLog::class
            // SendNotification::class,
        ],

        CreatedMailInProcess::class => [
            ProcessMailAttributeTransaction::class,
            ProcessMailFile::class,
            ProcessMailVersion::class,
            ProcessMailTransaction::class,
            ProcessMailLog::class,
            // SendNotification::class,
        ],

        DispositedMailInProcess::class => [
            ProcessMailTransactionMemo::class,
            ProcessMailLog::class
            // SendNotification::class,

        ],

        ForwardedMailInProcess::class => [
            ProcessMailLog::class
            // SendNotification::class,
        ],

        UpdatedMailInProcess::class => [
            ProcessMailAttributeTransaction::class,
            ProcessMailFile::class,
            ProcessMailVersion::class,
            ProcessMailTransaction::class,
            ProcessMailLog::class,
            // SendNotification::class,
        ],

        UpdatedMailMasterProcess::class => [
            ProcessMailAttributeTransaction::class,
            ProcessMailFile::class,
            ProcessMailVersion::class,
            ProcessMailLog::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
