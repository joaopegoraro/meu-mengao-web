<?php

declare(strict_types=1);

require __DIR__ . '/../Autoload.php';
Autoload::register();

use App\App;
use App\Container;
use App\Core\Controller;
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
$router->get(
    routes: ['/calendario'],
    onMatch: fn ($request) => $container->getCalendarioController()->index($request),
);
$router->get(
    routes: ['/tabelas'],
    onMatch: fn ($request) => $container->getTabelasController()->index($request),
);

class Controller404 extends Controller
{
};
$controller404 = new Controller404($container->getBaseRenderer());
$controller404->respond404()->send();
