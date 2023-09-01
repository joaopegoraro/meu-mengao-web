<?php

declare(strict_types=1);

namespace App\Controller\Web;

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
        return $this->view(
            name: 'base',
            data: [
                'description' => 'Últimas notícias do Flamengo, vindas dos principais portais como Globo Esporte (GE), Coluna do Fla, Youtube de Mauro Cézar Pereira, Venê Casagrande e FlaTV. Pŕoxima partida do Flamengo e tabela do brasileirão.',
                'styles' => ['noticias', 'partida', 'tabela'],
                'content' => 'noticias',
                'data' => [
                    'noticias' => $this->noticiaRepository->findAll(),
                    'proximaPartida' => $this->partidaRepository->findProximaPartida(),
                    'tabelaBrasileirao' => $this->posicaoRepository->findWithCampeonatoId('serie-a', limit: 10),
                ],
            ],
        );
    }
}
