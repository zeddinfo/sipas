<?php

namespace App\Services\Facades;

use App\Services\MailAttributeServices;
use Illuminate\Support\Facades\Facade;

class MailAttributeService extends Facade{
    protected static function getFacadeAccessor(){
        return MailAttributeServices::class;
    }
}

