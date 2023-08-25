<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\Controller;
use App\Http\Request;
use App\Http\Response;

class ResultadosController extends Controller
{

    public function index(Request $request): Response
    {
        $partidas = [];
        for ($i = 0; $i <= 15; ++$i) {
            $partida = $this->renderer->render('components/partida');
            array_push($partidas, $partida);
        }

        $resultados = $this->renderer->render(
            view: 'partidas',
            data: ['partidas' => $partidas],
        );

        return $this->view(
            name: 'base',
            data: [
                'title' => 'Resultados',
                'content' => $resultados,
                'styles' => ['partidas', 'partida'],
            ],
        );
    }
}
