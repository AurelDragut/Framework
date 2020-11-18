<?php

namespace App\src;

use App\src\Http\Controllers\GreetingsController;
use League\Route\RouteCollectionInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Routes
{
    public static function routes(RouteCollectionInterface $route): RouteCollectionInterface
    {
        $route->get('/', function (ServerRequestInterface $request, ResponseInterface $response) {
            $response->getBody()->write('<h1>Hello World</h1>');
            return $response;
        });

        $route->get('/hello/{name}', GreetingsController::class . '::index');

        return $route;
    }
}
