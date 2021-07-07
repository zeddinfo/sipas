<?php

namespace App\Services\Facades;

use App\Services\MailTransactionCorrectionServices;
use Illuminate\Support\Facades\Facade;

class MailTransactionCorrectionService extends Facade{
    protected static function getFacadeAccessor(){
        return MailTransactionCorrectionServices::class;
    }
}

