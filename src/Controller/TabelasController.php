<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\Controller;
use App\Http\Request;
use App\Http\Response;
use App\Model\Campeonato;
use App\Model\Partida;
use App\Model\Posicao;

class TabelasController extends Controller
{

    public function index(Request $request): Response
    {
        $campeonatos = array_map(
            fn (int $n) => new Campeonato(
                id: strval($n),
                ano: $n . $n . $n . $n,
                nome: 'Campeonato' . $n,
                logo: '',
                possuiClassificacao: true,
                rodadaAtual: $n,
                rodadaFinal: $n * 5,
            ),
            range(1, 4)
        );

        $campeonatoSelecionado = $campeonatos[0];
        $campeonatoId = $request->queryParams['id'];
        if ($campeonatoId)
            foreach ($campeonatos as $campeonato) {
                if ($campeonato->id == $campeonatoId) {
                    $campeonatoSelecionado = $campeonato;
                }
            }

        $rodadaIndex = $request->queryParams['round'] ?? $campeonatoSelecionado->rodadaAtual;

        $rodadasViews = [];
        foreach (range(1, 10) as $index) {
            $partida = new Partida(
                id: 'id',
                data: 'sábado 21:30',
                timeCasa: "Red Bull Bragantino",
                timeFora: "Deportivo Pereira (ARG)",
                escudoCasa: "../images/flamengo-30.png",
                escudoFora: "../images/flamengo-30.png",
                golsCasa: '',
                golsFora: '',
                campeonato: "Série A",
                campeonatoId: "serie-a",
                partidaFlamengo: true,
                rodadaName: "Rodada 22",
                rodadaIndex: 22,
            );
            $partidaView = $this->renderer->render(
                view: 'components/partida',
                data: [
                    'partida' => $partida,
                    'esconderCampeonato' => true,
                ],
            );
            array_push($rodadasViews, $partidaView);
        }

        $tabelasViews = [];
        foreach (range(1, intval($campeonato->id)) as $index) {
            $posicoes = array_map(fn (int $n) => new Posicao(
                id: strval($n),
                posicao: strval($n),
                nomeTime: 'Red Bull Bragantino',
                escudoTime: "../images/flamengo-20.png",
                pontos: strval($n),
                jogos: strval($n),
                vitorias: strval($n),
                empates: strval($n),
                derrotas: strval($n),
                golsFeitos: strval($n),
                golsSofridos: strval($n),
                saldoGols: strval($n),
                campeonatoId: 'serie-a',
                classificacaoName: 'Grupo ' . $n,
                classificacaoIndex: $n,
            ), range(1, 20 - (4 * intval($campeonato->id))));
            $tabelaView = $this->renderer->render(
                view: 'components/tabela',
                data: [
                    'posicoes' => $posicoes,
                    'classificacaoName' => 'Grupo ' . $index,
                    'tabelaCompleta' => true,
                ],
            );
            array_push($tabelasViews, $tabelaView);
        }

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
