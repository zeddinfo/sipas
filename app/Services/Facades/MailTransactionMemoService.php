<?php

namespace App\Services\Facades;

use App\Services\MailTransactionMemoServices;
use Illuminate\Support\Facades\Facade;

class MailTransactionMemoService extends Facade{
    protected static function getFacadeAccessor(){
        return MailTransactionMemoServices::class;
    }
}

