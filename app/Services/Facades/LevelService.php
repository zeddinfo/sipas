<?php

namespace App\Services\Facades;

use App\Services\LevelServices;
use Illuminate\Support\Facades\Facade;

class LevelService extends Facade{
    protected static function getFacadeAccessor(){
        return LevelServices::class;
    }
}

