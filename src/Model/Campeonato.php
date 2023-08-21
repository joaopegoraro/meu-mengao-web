<?php

declare(strict_types=1);

namespace App\Model;

class Campeonato
{
    const TABLE = 'campeonatos';
    const ID = 'id';
    const ANO = 'ano';
    const NOME = 'nome';
    const LINK = 'link';
    const LOGO = 'logo';
    const POSSUI_CLASSIFICACAO = 'possui_classificacao';
    const RODADA_ATUAL = 'rodada_atual';

    public readonly string $id;
    public readonly string $ano;
    public readonly string $nome;
    public readonly string $link;
    public readonly string $logo;
    public readonly bool $possuiClassificacao;
    public readonly int $rodadaAtual;

    public function __construct(
        string $id,
        string $ano,
        string $nome,
        string $link,
        string $logo,
        bool $possuiClassificacao,
        int $rodadaAtual,
    ) {
        $this->id = $id;
        $this->ano = $ano;
        $this->nome = $nome;
        $this->link = $link;
        $this->logo = $logo;
        $this->possuiClassificacao = $possuiClassificacao;
        $this->rodadaAtual = $rodadaAtual;
    }

    static function fromArray(array $array): Campeonato
    {
        return new Campeonato(
            id: $array[self::ID],
            ano: $array[self::ANO],
            nome: $array[self::NOME],
            link: $array[self::LINK],
            logo: $array[self::LOGO],
            possuiClassificacao: $array[self::POSSUI_CLASSIFICACAO],
            rodadaAtual: $array[self::RODADA_ATUAL],
        );
    }

    function toArray(): array
    {
        return [
            self::ID => $this->id,
            self::ANO => $this->ano,
            self::NOME => $this->nome,
            self::LINK => $this->link,
            self::LOGO => $this->logo,
            self::POSSUI_CLASSIFICACAO => $this->possuiClassificacao,
            self::RODADA_ATUAL => $this->rodadaAtual,
        ];
    }
}
