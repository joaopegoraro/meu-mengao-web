<?php

declare(strict_types=1);

require __DIR__ . '/../Autoload.php';
Autoload::register();

use App\App;
use App\Container;
use App\Http\Router;

$app = new App(rootDir: dirname(__DIR__));
$container = new Container();
$router = new Router();

$router->get(
    routes: ['/', '/noticias'],
    onMatch: fn ($request) => $container->getNoticiasController()->index($request),
);

$router->get(
    routes: ['/resultados'],
    onMatch: fn ($request) => $container->getResultadosController()->index($request),
);

http_response_code(404);
