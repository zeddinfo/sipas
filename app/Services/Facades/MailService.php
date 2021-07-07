<?php

namespace App\Services\Facades;

use App\Services\MailServices;
use Illuminate\Support\Facades\Facade;

class MailService extends Facade{
    protected static function getFacadeAccessor(){
        return MailServices::class;
    }
}

