<?php

use GerFin\Application;
use GerFin\ServiceContainer;
use GerFin\Plugins\RoutePlugin;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());

$app->get('/', function (RequestInterface $request) {
    var_dump($request->getUri()); die();
    echo 'Hello World!!';
});

$app->get('/home/{name}/{id}', function (ServerRequestInterface $request) {
    $response = new Response();
    $response->getBody()->write('response com emmiter do diactoros');
    return $response;
});

$app->start();
