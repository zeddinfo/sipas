<?php

namespace App\Services\Facades;

use App\Services\MailVersionServices;
use Illuminate\Support\Facades\Facade;

class MailVersionService extends Facade{
    protected static function getFacadeAccessor(){
        return MailVersionServices::class;
    }
}

