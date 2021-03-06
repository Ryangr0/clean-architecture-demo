<?php declare(strict_types=1);

include 'vendor/autoload.php';

use CleanArchitecture\Presentation\Controllers\IndexController;
use Laminas\Diactoros\ResponseFactory;

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$responseFactory = new ResponseFactory();

$strategy = new League\Route\Strategy\JsonStrategy($responseFactory);
$router = (new League\Route\Router)->setStrategy($strategy);

// map a route
$router->map('GET', '/', IndexController::class);

$response = $router->dispatch($request);

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);
