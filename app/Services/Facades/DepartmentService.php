<?php

namespace App\Services\Facades;

use App\Services\DepartmentServices;
use Illuminate\Support\Facades\Facade;

class DepartmentService extends Facade{
    protected static function getFacadeAccessor(){
        return DepartmentServices::class;
    }
}

