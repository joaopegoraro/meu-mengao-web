<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\Controller;
use App\Core\Renderer;
use App\Http\Request;
use App\Http\Response;
use App\Repository\PartidaRepository;

class ResultadosController extends Controller
{

    private readonly PartidaRepository $partidaRepository;

    public function __construct(
        Renderer $renderer,
        PartidaRepository $partidaRepository,
    ) {
        $this->partidaRepository = $partidaRepository;
        parent::__construct($renderer);
    }

    public function index(Request $request): Response
    {
        $partidas = $this->partidaRepository->findResultados();
        $partidasView = [];
        foreach ($partidas as $partida) {
            $partidaView = $this->renderer->render(
                view: 'components/partida',
                data: [
                    'partida' => $partida,
                    'mostrarPlacar' => true,
                ],
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
