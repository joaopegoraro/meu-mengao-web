<?php

declare(strict_types=1);

namespace App\Controller\Web;

use App\Core\Controller;
use App\Core\Renderer;
use App\Http\Request;
use App\Http\Response;
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
        $campeonatoId = $request->queryParams['id'] ?? $this->partidaRepository->findProximaPartida()->campeonatoId;
        if ($campeonatoId)
            foreach ($campeonatos as $campeonato) {
                if ($campeonato->id == $campeonatoId) {
                    $campeonatoSelecionado = $campeonato;
                }
            }

        if (!isset($campeonatoSelecionado) || !$campeonatoSelecionado) {
            return $this->respond404();
        }


        // agrupar posicoes com mesmo classificacaoName
        $posicoes = $this->posicaoRepository->findWithCampeonatoId($campeonatoSelecionado->id);
        $tabelas = [];
        foreach ($posicoes as $posicao) {
            if (!isset($tabelas[$posicao->classificacaoName])) {
                $tabelas[$posicao->classificacaoName] = ['index' => $posicao->classificacaoIndex];
            }
            array_push($tabelas[$posicao->classificacaoName], $posicao);
        }

        // ordenar pelo classificacaoIndex
        uasort($tabelas, fn ($a, $b) => $a['index'] > $b['index']);

        $rodadaIndex = $request->queryParams['round'] ?? $campeonatoSelecionado->rodadaAtual;
        $partidas = $this->partidaRepository->findWithRodadaIndex(
            campeonatoId: $campeonatoSelecionado->id,
            rodadaIndex: intval($rodadaIndex),
        );

        if (!$partidas) {
            return $this->respond404();
        }

        return $this->view(
            name: 'base',
            data: [
                'title' => $campeonatoSelecionado->nome,
                'description' => 'Tabelas, classificação e jogos do Flamengo na Série A (Brasileirão), Copa Libertadores, Copa do Brasil, Campeonato Carioca (Estaduais) e outros.',
                'content' => 'tabelas',
                'data' => [
                    'rodadas' => $partidas,
                    'tabelas' => $tabelas,
                    'campeonatoSelecionado' => $campeonatoSelecionado,
                    'campeonatos' => $campeonatos,
                    'rodadaIndex' => $rodadaIndex,
                    'rodadaName' =>  $partidas[0]->rodadaName,
                ],
            ],
        );
    }
}
