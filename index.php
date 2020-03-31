<?php declare(strict_types=1);

include 'vendor/autoload.php';

use Laminas\Diactoros\ResponseFactory;
use Psr\Http\Message\ServerRequestInterface;

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$responseFactory = new ResponseFactory();

$strategy = new League\Route\Strategy\JsonStrategy($responseFactory);
$router = (new League\Route\Router)->setStrategy($strategy);

// map a route
$router->map('GET', '/', function (ServerRequestInterface $request): array {
    return [
        'title' => 'My New Simple API',
        'version' => 1,
    ];
});

$response = $router->dispatch($request);

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);
