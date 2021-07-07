<?php

namespace App\Services\Facades;

use App\Services\MailTransactionServices;
use Illuminate\Support\Facades\Facade;

class MailTransactionService extends Facade{
    protected static function getFacadeAccessor(){
        return MailTransactionServices::class;
    }
}

