<?php

namespace App\Utilities;

use Auth;

class RouteHelper
{
    public static function get(string $route_name)
    {
        $route = strtolower(Auth::user()->level->getRole()) . '.' . $route_name;
        return $route;
    }

    public static function switch($routes)
    {
        switch (Auth::user()->level->getRole()) {
            case 'Admin':
                return $routes[0];
                break;

            default:
                # code...
                break;
        }
    }
}
