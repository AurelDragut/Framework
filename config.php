<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;

return [
    'request' => function() {
        return ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );
    },
    'response' => new Response(),
    'emitter' => new SapiEmitter(),
    Twig_Environment::class => function() {
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/views');
        return new Twig_Environment($loader);
    },
    QueryBuilder::class => function() {
        $options = [
            'dbname' => 'rezepten',
            'username' => 'root',
            'password' => '',
            'host' => '127.0.0.1',
            'driver' => 'pdo_mysql',
        ];

        $connection = DriverManager::getConnection($options);

        return $connection->createQueryBuilder();
    },
];
