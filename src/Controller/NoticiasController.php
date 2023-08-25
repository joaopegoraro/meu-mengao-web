<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\Controller;
use App\Http\Request;
use App\Http\Response;
use App\Model\Noticia;
use App\Model\Partida;
use App\Model\Posicao;

class NoticiasController extends Controller
{

    public function index(Request $request): Response
    {
        $nextMatch = new Partida(
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
        $nextMatchView = $this->renderer->render(
            view: 'components/partida',
            data: ['partida' => $nextMatch],
        );

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
            campeonatoName: 'Série A',
            campeonatoIndex: 0,
        ), range(1, 10));
        $tabelaBrasileiraoView = $this->renderer->render(
            view: 'components/tabela',
            data: ['posicoes' => $posicoes],
        );

        $noticias = array_map(fn (int $n) => new Noticia(
            id: $n,
            link: "https://ge.globo.com/futebol/times/flamengo/noticia/2023/08/25/hora-de-reagir-nas-ultimas-10-rodadas-flamengo-foi-o-time-que-mais-sofreu-finalizacoes.ghtml",
            titulo: "Nas últimas 10 rodadas, Fla é o time que mais sofre finalizações",
            data: strval($n),
            site: "Globo Esporte",
            logoSite: "https://s2-ge.glbimg.com/OJZOBUppV6hQEkOeh_nD3tfAXIY=/32x32/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2020/R/Y/ZTubz4T1OYJ59I7fdKkQ/fav-icon-96-x-96.png",
            foto: "https://s2-ge.glbimg.com/_rXw-zWJl2ps0o0-tsOi7NPU-V0=/0x275:3000x1963/1080x608/smart/filters:max_age(3600)/https://i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2023/X/1/ajI84CRGi9an8nFKBajQ/agif2308201638128.jpg",
        ), range(1, 10));
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
