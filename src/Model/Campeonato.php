<?php

declare(strict_types=1);

namespace App\Model;

class Campeonato
{
    const TABLE = 'campeonatos';
    const ID = 'id';
    const ANO = 'ano';
    const NOME = 'nome';
    const POSSUI_CLASSIFICACAO = 'possui_classificacao';
    const RODADA_ATUAL = 'rodada_atual';
    const RODADA_FINAL = 'rodada_final';

    public readonly string $id;
    public readonly string $ano;
    public readonly string $nome;
    public readonly bool $possuiClassificacao;
    public readonly int $rodadaAtual;
    public readonly int $rodadaFinal;

    public function __construct(
        string $id,
        string $ano,
        string $nome,
        bool $possuiClassificacao,
        int $rodadaAtual,
        int $rodadaFinal,
    ) {
        $this->id = $id;
        $this->ano = $ano;
        $this->nome = $nome;
        $this->possuiClassificacao = $possuiClassificacao;
        $this->rodadaAtual = $rodadaAtual;
        $this->rodadaFinal = $rodadaFinal;
    }

    static function fromArray(array $array): Campeonato
    {
        return new Campeonato(
            id: $array[self::ID],
            ano: $array[self::ANO] ?? "",
            nome: $array[self::NOME],
            possuiClassificacao: $array[self::POSSUI_CLASSIFICACAO] == 1,
            rodadaAtual: $array[self::RODADA_ATUAL],
            rodadaFinal: $array[self::RODADA_FINAL],
        );
    }

    function toArray(): array
    {
        return [
            self::ID => $this->id,
            self::ANO => $this->ano,
            self::NOME => $this->nome,
            self::POSSUI_CLASSIFICACAO => $this->possuiClassificacao,
            self::RODADA_ATUAL => $this->rodadaAtual,
            self::RODADA_FINAL => $this->rodadaFinal,
        ];
    }
}
