<?php

declare(strict_types=1);

namespace App\Model;

class Posicao
{
    const TABLE = 'posicoes';
    const ID = 'id';
    const POSICAO = 'posicao';
    const NOME_TIME = 'nome_time';
    const ESCUDO_TIME = 'escudo_time';
    const PONTOS = 'pontos';
    const JOGOS = 'jogos';
    const VITORIAS = 'vitorias';
    const EMPATES = 'empates';
    const DERROTAS = 'derrotas';
    const GOLS_FEITOS = 'gols_feitos';
    const GOLS_SOFRIDOS = 'gols_sofridos';
    const SALDO_GOLS = 'saldo_gols';
    const CAMPEONATO_ID = 'campeonato_id';
    const CAMPEONATO_NAME = 'campeonato_name';
    const CAMPEONATO_INDEX = 'campeonato_index';

    public readonly string $id;
    public readonly string $posicao;
    public readonly string $nomeTime;
    public readonly string $escudoTime;
    public readonly string $pontos;
    public readonly string $jogos;
    public readonly string $vitorias;
    public readonly string $empates;
    public readonly string $derrotas;
    public readonly string $golsFeitos;
    public readonly string $golsSofridos;
    public readonly string $saldoGols;
    public readonly string $campeonatoId;
    public readonly string $campeonatoName;
    public readonly int $campeonatoIndex;

    public function __construct(
        string $id,
        string $posicao,
        string $nomeTime,
        string $escudoTime,
        string $pontos,
        string $jogos,
        string $vitorias,
        string $empates,
        string $derrotas,
        string $golsFeitos,
        string $golsSofridos,
        string $saldoGols,
        string $campeonatoId,
        string $campeonatoName,
        int $campeonatoIndex,
    ) {
        $this->id = $id;
        $this->posicao = $posicao;
        $this->nomeTime = $nomeTime;
        $this->escudoTime = $escudoTime;
        $this->pontos = $pontos;
        $this->jogos = $jogos;
        $this->vitorias = $vitorias;
        $this->empates = $empates;
        $this->derrotas = $derrotas;
        $this->golsFeitos = $golsFeitos;
        $this->golsSofridos = $golsSofridos;
        $this->saldoGols = $saldoGols;
        $this->campeonatoId = $campeonatoId;
        $this->campeonatoName = $campeonatoName;
        $this->campeonatoIndex = $campeonatoIndex;
    }

    static function fromArray(array $array): Posicao
    {
        return new Posicao(
            id: $array[self::ID],
            posicao: $array[self::POSICAO],
            nomeTime: $array[self::NOME_TIME],
            escudoTime: $array[self::ESCUDO_TIME],
            pontos: $array[self::PONTOS],
            jogos: $array[self::JOGOS],
            vitorias: $array[self::VITORIAS],
            empates: $array[self::EMPATES],
            derrotas: $array[self::DERROTAS],
            golsFeitos: $array[self::GOLS_FEITOS],
            golsSofridos: $array[self::GOLS_SOFRIDOS],
            saldoGols: $array[self::SALDO_GOLS],
            campeonatoId: $array[self::CAMPEONATO_ID],
            campeonatoName: $array[self::CAMPEONATO_NAME],
            campeonatoIndex: $array[self::CAMPEONATO_INDEX],
        );
    }

    function toArray(): array
    {
        return [
            self::ID => $this->id,
            self::POSICAO => $this->posicao,
            self::NOME_TIME => $this->nomeTime,
            self::ESCUDO_TIME => $this->escudoTime,
            self::PONTOS => $this->pontos,
            self::JOGOS => $this->jogos,
            self::VITORIAS => $this->vitorias,
            self::EMPATES => $this->empates,
            self::DERROTAS => $this->derrotas,
            self::GOLS_FEITOS => $this->golsFeitos,
            self::GOLS_SOFRIDOS => $this->golsSofridos,
            self::SALDO_GOLS => $this->saldoGols,
            self::CAMPEONATO_ID => $this->campeonatoId,
            self::CAMPEONATO_NAME => $this->campeonatoName,
            self::CAMPEONATO_INDEX => $this->campeonatoIndex,
        ];
    }
}
