<?php

namespace App\src\Http\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class GreetingsController extends BaseController
{
    public function index(
        ServerRequestInterface $request,
        ResponseInterface $response,
        $arguments
    ) : ResponseInterface
    {
        return $this->render($response, 'home', $arguments);
    }
}
