<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\Controller;
use App\Core\Renderer;
use App\Http\Request;
use App\Http\Response;
use App\Repository\NoticiaRepository;
use App\Repository\PartidaRepository;
use App\Repository\PosicaoRepository;

class NoticiasController extends Controller
{

    private readonly PartidaRepository $partidaRepository;
    private readonly PosicaoRepository $posicaoRepository;
    private readonly NoticiaRepository $noticiaRepository;

    public function __construct(
        Renderer $renderer,
        PartidaRepository $partidaRepository,
        PosicaoRepository $posicaoRepository,
        NoticiaRepository $noticiaRepository,
    ) {
        $this->partidaRepository = $partidaRepository;
        $this->posicaoRepository = $posicaoRepository;
        $this->noticiaRepository = $noticiaRepository;
        parent::__construct($renderer);
    }

    public function index(Request $request): Response
    {
        $nextMatch = $this->partidaRepository->findProximaPartida();
        $nextMatchView = $this->renderer->render(
            view: 'components/partida',
            data: ['partida' => $nextMatch],
        );


        $posicoes = $this->posicaoRepository->findWithCampeonatoId('serie-a', limit: 10);
        $tabelaBrasileiraoView = $this->renderer->render(
            view: 'components/tabela',
            data: ['posicoes' => $posicoes],
        );

        $noticias = $this->noticiaRepository->findAll();
        $noticiasView = $this->renderer->render(
            view: 'noticias',
            data: [
                'noticias' => $noticias,
                'nextMatch' => $nextMatchView,
                'tabelaBrasileirao' => $tabelaBrasileiraoView,
            ],
        );

        return $this->view(
            name: 'base',
            data: [
                'content' => $noticiasView,
                'styles' => ['noticias', 'partida', 'tabela'],
            ],
        );
    }
}
