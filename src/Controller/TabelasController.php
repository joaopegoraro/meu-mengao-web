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
        $campeonatoId = $request->queryParams['id'] ?? $campeonatos[0]->id;
        if ($campeonatoId)
            foreach ($campeonatos as $campeonato) {
                if ($campeonato->id == $campeonatoId) {
                    $campeonatoSelecionado = $campeonato;
                }
            }

        $rodadaIndex = $request->queryParams['round'] ?? $campeonatoSelecionado->rodadaAtual;
        $partidas = $this->partidaRepository->findWithRodadaIndex(
            campeonatoId: $campeonatoSelecionado->id,
            rodadaIndex: intval($rodadaIndex),
        );
        $rodadasViews = [];
        foreach ($partidas as $partida) {
            $partidaView = $this->renderer->render(
                view: 'components/partida',
                data: [
                    'partida' => $partida,
                    'esconderCampeonato' => true,
                    'mostrarPlacar' => true,
                ],
            );
            array_push($rodadasViews, $partidaView);
        }

        $posicoes = $this->posicaoRepository->findWithCampeonatoId($campeonatoSelecionado->id);
        $tabelas = [];
        foreach ($posicoes as $posicao) {
            if (!isset($tabelas[$posicao->classificacaoName])) {
                $tabelas[$posicao->classificacaoName] = ['index' => $posicao->classificacaoIndex];
            }
            array_push($tabelas[$posicao->classificacaoName], $posicao);
        }
        uasort($tabelas, fn ($a, $b) => $a['index'] > $b['index']);

        $tabelasViews = [];
        foreach ($tabelas as $classificacaoName => $posicoes) {
            unset($posicoes['index']);
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

        $tabelasPageView = $this->renderer->render(
            view: 'tabelas',
            data: [
                'campeonatoSelecionado' => $campeonatoSelecionado,
                'campeonatos' => $campeonatos,
                'tabelaViews' => $tabelasViews,
                'rodadaViews' => $rodadasViews,
                'rodadaIndex' => $rodadaIndex,
                'rodadaName' =>  $partidas[0]->rodadaName,
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
