<?php

namespace App\Services\Facades;

use App\Services\MailAttributeTransactionServices;
use Illuminate\Support\Facades\Facade;

class MailAttributeTransactionService extends Facade{
    protected static function getFacadeAccessor(){
        return MailAttributeTransactionServices::class;
    }
}

