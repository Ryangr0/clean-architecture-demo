<?php declare(strict_types=1);

namespace CleanArchitecture\Presentation\Controllers;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class IndexController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response();
        $response->getBody()->write(json_encode(
            [
                'title' => 'My New Simple API',
                'version' => 1,
            ]
        ));
        return $response;
    }
}
