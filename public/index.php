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

/*
    WEB ROUTES
*/

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

/*
    API ROUTES
*/

$router->get(
    routes: ['/api/noticias'],
    onMatch: function ($request) use ($container) {
        return $container->getNoticiasApiController()->findAll($request);
    },
);
$router->get(
    routes: ['/api/posicao/campeonato/{campeonatoId}'],
    onMatch: function ($request) use ($container) {
        return $container->getPosicoesApiController()->findAllWithCampeonatoId($request);
    },
);
$router->get(
    routes: ['/api/campeonatos'],
    onMatch: function ($request) use ($container) {
        return $container->getCampeonatosApiController()->findAll($request);
    },
);
$router->get(
    routes: ['/api/partidas/proxima'],
    onMatch: function ($request) use ($container) {
        return $container->getPartidasApiController()->findProximaPartida($request);
    },
);
$router->get(
    routes: ['/api/partidas/resultados'],
    onMatch: function ($request) use ($container) {
        return $container->getPartidasApiController()->findResultados($request);
    },
);
$router->get(
    routes: ['/api/partidas/calendario'],
    onMatch: function ($request) use ($container) {
        return $container->getPartidasApiController()->findCalendario($request);
    },
);
$router->get(
    routes: ['/api/partidas/campeonato/{campeonatoId}/{rodadaIndex}'],
    onMatch: function ($request) use ($container) {
        return $container->getPartidasApiController()->findAllWithRodadaIndex($request);
    },
);
$router->get(
    routes: ['/api/partidas/campeonato/{campeonatoId}'],
    onMatch: function ($request) use ($container) {
        return $container->getPartidasApiController()->findAllWithCampeonatoId($request);
    },
);

/*
    404
*/

// if url starts with '/api', only return an empty response with 404, without any html
if (preg_match('/^\/api\/?.*/', $_SERVER['REQUEST_URI'])) {
    http_response_code(404);
    exit;
}

// else, return the 404.php template
class Controller404 extends Controller
{
};
$controller404 = new Controller404($container->getBaseRenderer());
$controller404->respond404()->send();
