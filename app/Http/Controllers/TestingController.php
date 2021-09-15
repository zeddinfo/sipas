<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function testingOne()
    {
        $level = new Level();
        $level->name = Level::LEVEL_TU;

        dd($level->getUpperLevel('out'));
    }
}
