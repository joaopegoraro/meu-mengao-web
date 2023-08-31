<?php

declare(strict_types=1);

namespace App\Controller\Web;

use App\Core\Controller;
use App\Core\Renderer;
use App\Http\Request;
use App\Http\Response;
use App\Repository\PartidaRepository;

class CalendarioController extends Controller
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
        $partidas = $this->partidaRepository->findCalendario();
        $partidasView = [];
        foreach ($partidas as $partida) {
            $partidaView = $this->renderer->render(
                view: 'components/partida',
                data: ['partida' => $partida],
            );
            array_push($partidasView, $partidaView);
        }

        $calendarioView = $this->renderer->render(
            view: 'components/partidas',
            data: [
                'partidasTitle' => 'Calendário',
                'partidas' => $partidasView,
            ],
        );

        return $this->view(
            name: 'base',
            data: [
                'title' => 'Calendário',
                'content' => $calendarioView,
                'styles' => ['partidas', 'partida'],
            ],
        );
    }
}
