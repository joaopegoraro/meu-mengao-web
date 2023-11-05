<?php

declare(strict_types=1);

namespace App\Model;

use DateTime;
use IntlDateFormatter;

class Partida
{
    const TABLE = 'partidas';
    const ID = 'id';
    const DATA = 'data';
    const TIME_CASA = 'time_casa';
    const TIME_FORA = 'time_fora';
    const ESCUDO_CASA = 'escudo_casa';
    const ESCUDO_FORA = 'escudo_fora';
    const GOLS_CASA = 'gols_casa';
    const GOLS_FORA = 'gols_fora';
    const CAMPEONATO = 'campeonato';
    const CAMPEONATO_ID = 'campeonato_id';
    const PARTIDA_FLAMENGO = 'partida_flamengo';
    const RODADA_NAME = 'rodada_name';
    const RODADA_INDEX = 'rodada_index';

    public readonly string $id;
    public readonly string $data;
    public readonly string $timeCasa;
    public readonly string $timeFora;
    public readonly string $escudoCasa;
    public readonly string $escudoFora;
    public readonly string $golsCasa;
    public readonly string $golsFora;
    public readonly string $campeonato;
    public readonly string $campeonatoId;
    public readonly bool $partidaFlamengo;
    public readonly string $rodadaName;
    public readonly int $rodadaIndex;

    public function __construct(
        string $id,
        string $data,
        string $timeCasa,
        string $timeFora,
        string $escudoCasa,
        string $escudoFora,
        string $golsCasa,
        string $golsFora,
        string $campeonato,
        string $campeonatoId,
        bool $partidaFlamengo,
        string $rodadaName,
        int $rodadaIndex,
    ) {
        $this->id = $id;
        $this->data = $data;
        $this->timeCasa = $timeCasa;
        $this->timeFora = $timeFora;
        $this->escudoCasa = $escudoCasa;
        $this->escudoFora = $escudoFora;
        $this->golsCasa = $golsCasa;
        $this->golsFora = $golsFora;
        $this->campeonato = $campeonato;
        $this->campeonatoId = $campeonatoId;
        $this->partidaFlamengo = $partidaFlamengo;
        $this->rodadaName = $rodadaName;
        $this->rodadaIndex = $rodadaIndex;
    }

    static public function fromArray(array $array): Partida
    {
        return new Partida(
            id: $array[self::ID],
            data: $array[self::DATA],
            timeCasa: $array[self::TIME_CASA],
            timeFora: $array[self::TIME_FORA],
            escudoCasa: $array[self::ESCUDO_CASA],
            escudoFora: $array[self::ESCUDO_FORA],
            golsCasa: $array[self::GOLS_CASA],
            golsFora: $array[self::GOLS_FORA],
            campeonato: $array[self::CAMPEONATO],
            campeonatoId: $array[self::CAMPEONATO_ID],
            partidaFlamengo: $array[self::PARTIDA_FLAMENGO] == 1,
            rodadaName: $array[self::RODADA_NAME],
            rodadaIndex: $array[self::RODADA_INDEX],
        );
    }

    public function toArray(): array
    {
        return [
            self::ID => $this->id,
            self::DATA => $this->data,
            self::TIME_CASA => $this->timeCasa,
            self::TIME_FORA => $this->timeFora,
            self::ESCUDO_CASA => $this->escudoCasa,
            self::ESCUDO_FORA => $this->escudoFora,
            self::GOLS_CASA => $this->golsCasa,
            self::GOLS_FORA => $this->golsFora,
            self::CAMPEONATO => $this->campeonato,
            self::CAMPEONATO_ID => $this->campeonatoId,
            self::PARTIDA_FLAMENGO => $this->partidaFlamengo,
            self::RODADA_NAME => $this->rodadaName,
            self::RODADA_INDEX => $this->rodadaIndex,
        ];
    }

    public function getReadableDate(): array
    {
        $dateSeconds = (int) $this->data / 1000;
        $now = new DateTime('now');
        $now->setTime(0, 0, 0, 0);
        $dateTime = new DateTime('@' . $dateSeconds);
        $dateTime->setTime(0, 0, 0, 0);

        $fmt = datefmt_create(
            'pt_BR',
            IntlDateFormatter::FULL,
            IntlDateFormatter::FULL,
            timezone: 'America/Sao_Paulo',
            pattern: 'H:mm'
        );
        $time = $fmt->format($dateSeconds);

        $dayDifference = (int) $now->diff($dateTime)->format("%R%a"); // Extract days count in interval
        switch ($dayDifference) {
            case -1:
                $date = 'Ontem';
                break;
            case 0:
                $date = 'Hoje';
                break;
            case 1:
                $date = 'Amanhã';
                break;
            default:
                $fmt->setPattern(abs($dayDifference) < 7 ? "EEEE" : "dd/MM");
                $date = $fmt->format($dateSeconds);
        }

        return [
            'date' => $date,
            'time' => $time,
        ];
    }
}
