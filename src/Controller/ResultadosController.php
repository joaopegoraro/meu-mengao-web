<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\Controller;
use App\Http\Request;
use App\Http\Response;
use App\Model\Partida;

class ResultadosController extends Controller
{

    public function index(Request $request): Response
    {
        $partidasView = [];
        for ($i = 0; $i <= 15; ++$i) {
            $partida = new Partida(
                id: 'id',
                data: 'sábado 21:30',
                timeCasa: "Red Bull Bragantino",
                timeFora: "Deportivo Pereira (ARG)",
                escudoCasa: "../images/flamengo-30.png",
                escudoFora: "../images/flamengo-30.png",
                golsCasa: '2',
                golsFora: '0',
                campeonato: "Série A",
                campeonatoId: "serie-a",
                partidaFlamengo: true,
                rodadaName: "Rodada 22",
                rodadaIndex: 22,
            );
            $partidaView = $this->renderer->render(
                view: 'components/partida',
                data: ['partida' => $partida],
            );
            array_push($partidasView, $partidaView);
        }

        $resultadosView = $this->renderer->render(
            view: 'components/partidas',
            data: [
                'partidasTitle' => 'Resultados',
                'partidas' => $partidasView,
            ],
        );

        return $this->view(
            name: 'base',
            data: [
                'title' => 'Resultados',
                'content' => $resultadosView,
                'styles' => ['partidas', 'partida'],
            ],
        );
    }
}
