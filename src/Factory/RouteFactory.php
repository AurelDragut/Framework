<?php

namespace App\src\Factory;

use App\src\Routes;
use DI\Container;
use League\Route\RouteCollection;

class RouteFactory
{
    public static function build(Container $container):RouteCollection
    {
        $route = new RouteCollection($container);

        Routes::routes($route);

        return $route;
    }
}
