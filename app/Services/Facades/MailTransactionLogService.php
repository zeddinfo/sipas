<?php

namespace App\Services\Facades;

use App\Services\MailTransactionLogServices;
use Illuminate\Support\Facades\Facade;

class MailTransactionLogService extends Facade{
    protected static function getFacadeAccessor(){
        return MailTransactionLogServices::class;
    }
}

