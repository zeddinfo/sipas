<?php

namespace App\Services\Facades;

use App\Services\UserServices;
use Illuminate\Support\Facades\Facade;

class UserService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UserServices::class;
    }
}
