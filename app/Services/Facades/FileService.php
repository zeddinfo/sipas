<?php

namespace App\Services\Facades;

use App\Services\FileServices;
use Illuminate\Support\Facades\Facade;

class FileService extends Facade{
    protected static function getFacadeAccessor(){
        return FileServices::class;
    }
}

