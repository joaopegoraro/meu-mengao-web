<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\Controller;
use App\Core\Renderer;
use App\Http\Request;
use App\Http\Response;
use App\Model\Campeonato;
use App\Model\Partida;
use App\Model\Posicao;
use App\Repository\CampeonatoRepository;
use App\Repository\PartidaRepository;
use App\Repository\PosicaoRepository;

class TabelasController extends Controller
{

    private readonly CampeonatoRepository $campeonatoRepository;
    private readonly PartidaRepository $partidaRepository;
    private readonly PosicaoRepository $posicaoRepository;

    public function __construct(
        Renderer $renderer,
        CampeonatoRepository $campeonatoRepository,
        PartidaRepository $partidaRepository,
        PosicaoRepository $posicaoRepository,
    ) {
        $this->campeonatoRepository = $campeonatoRepository;
        $this->partidaRepository = $partidaRepository;
        $this->posicaoRepository = $posicaoRepository;
        parent::__construct($renderer);
    }

    public function index(Request $request): Response
    {
        $campeonatos = $this->campeonatoRepository->findAll();
        $campeonatoSelecionado = $campeonatos[0];
        $campeonatoId = $request->queryParams['id'];
        if ($campeonatoId)
            foreach ($campeonatos as $campeonato) {
                if ($campeonato->id == $campeonatoId) {
                    $campeonatoSelecionado = $campeonato;
                }
            }


        $partidas = $this->partidaRepository->findWithCampeonatoId($campeonatoSelecionado->id);
        $rodadasViews = [];
        foreach ($partidas as $partida) {
            $partidaView = $this->renderer->render(
                view: 'components/partida',
                data: [
                    'partida' => $partida,
                    'esconderCampeonato' => true,
                ],
            );
            array_push($rodadasViews, $partidaView);
        }

        $posicoes = $this->posicaoRepository->findWithCampeonatoId($campeonatoSelecionado->id);
        $tabelas = [];
        foreach ($posicoes as $posicao) {
            array_push($tabelas[$posicao->classificacaoName], $posicao);
        }

        $tabelasViews = [];
        foreach ($tabelas as $classificacaoName => $posicao) {
            $tabelaView = $this->renderer->render(
                view: 'components/tabela',
                data: [
                    'posicoes' => $posicoes,
                    'classificacaoName' => $classificacaoName,
                    'tabelaCompleta' => true,
                ],
            );
            array_push($tabelasViews, $tabelaView);
        }

        $rodadaIndex = $request->queryParams['round'] ?? $campeonatoSelecionado->rodadaAtual;
        $tabelasPageView = $this->renderer->render(
            view: 'tabelas',
            data: [
                'campeonatoName' => $campeonatoSelecionado->nome,
                'campeonatos' => $campeonatos,
                'tabelaViews' => $tabelasViews,
                'rodadaViews' => $rodadasViews,
                'rodadaIndex' => $rodadaIndex,
                'rodadaName' => 'Rodada ' . $rodadaIndex + 1,
                'rodadaFinal' => $campeonato->rodadaFinal,
            ],
        );

        return $this->view(
            name: 'base',
            data: [
                'title' => 'Tabelas',
                'content' => $tabelasPageView,
                'styles' => ['tabelas', 'partida', 'tabela'],
            ],
        );
    }
}
