<?php

namespace App\Providers;

use App\Events\CreatedMailInProcess;
use App\Events\CreatedMailOutProcess;
use App\Events\ForwardedMailOut;
use App\Events\RevisedMailOutProcess;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\ProcessFile;
use App\Listeners\ProcessMailAttributeTransaction;
use App\Listeners\ProcessMailTransactionLog;
use App\Listeners\ProcessMailTransaction;
use App\Listeners\ProcessMailVersion;
use App\Listeners\SendNotification;
use App\Events\UpdatedMailOutProcess;
use App\Listeners\ProcessMailCorrection;

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
            ProcessFile::class,
            ProcessMailVersion::class,
            ProcessMailTransaction::class,
            ProcessMailTransactionLog::class,
            // SendNotification::class,
        ],

        UpdatedMailOutProcess::class => [
            ProcessMailAttributeTransaction::class,
            ProcessFile::class,
            ProcessMailVersion::class,
            ProcessMailTransaction::class,
            ProcessMailTransactionLog::class,
            // SendNotification::class,
        ],

        ForwardedMailOut::class => [
            ProcessMailTransaction::class,
            ProcessMailTransactionLog::class
            // SendNotification::class,
        ],

        RevisedMailOutProcess::class => [
            ProcessMailTransaction::class,
            ProcessFile::class,
            ProcessMailCorrection::class,
            ProcessMailTransactionLog::class
            // SendNotification::class,
        ],

        CreatedMailInProcess::class => [
            ProcessMailAttributeTransaction::class,
            ProcessFile::class,
            ProcessMailVersion::class,
            ProcessMailTransaction::class,
            ProcessMailTransactionLog::class,
            // SendNotification::class,
        ],

        UpdatedMailOutProcess::class => [
            ProcessMailAttributeTransaction::class,
            ProcessFile::class,
            ProcessMailVersion::class,
            ProcessMailTransaction::class,
            ProcessMailTransactionLog::class,
            // SendNotification::class,
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
