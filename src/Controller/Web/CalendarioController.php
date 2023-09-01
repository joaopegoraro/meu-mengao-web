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
        return $this->view(
            name: 'base',
            data: [
                'title' => 'Calendário',
                'description' => 'Próximos jogos do Flamengo.',
                'styles' => ['partidas', 'partida'],
                'content' => 'components/partidas',
                'data' => [
                    'partidasTitle' => 'Calendário',
                    'partidas' => $this->partidaRepository->findCalendario(),
                ],
            ],
        );
    }
}
