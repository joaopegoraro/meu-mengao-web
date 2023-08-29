<?php

declare(strict_types=1);

namespace App\Repository;

use App\Database\Database;
use App\Model\Partida;

class PartidaRepository
{

    private readonly Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function findProximaPartida(): Partida|null
    {
        $partida = null;
        $conn = $this->db->getConnection();

        $table = Partida::TABLE;
        $data = Partida::DATA;
        $partidaFlamengo = Partida::PARTIDA_FLAMENGO;
        $sql = "SELECT * FROM {$table} 
                WHERE {$partidaFlamengo} = :partidaFlamengo
                AND {$data} >= :data
                ORDER BY {$data} ASC
                LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'partidaFlamengo' => true,
            'data' => time(),
        ]);
        while ($row = $stmt->fetch()) {
            $partida = Partida::fromArray($row);
        }

        return $partida;
    }

    /**
     * @return Partida[]
     */
    public function findResultados(): array
    {
        $partidas = [];
        $conn = $this->db->getConnection();

        $table = Partida::TABLE;
        $data = Partida::DATA;
        $partidaFlamengo = Partida::PARTIDA_FLAMENGO;
        $sql = "SELECT * FROM {$table} 
                WHERE {$partidaFlamengo} = :partidaFlamengo 
                AND {$data} < :data 
                ORDER BY {$data} DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'partidaFlamengo' => true,
            'data' => time(),
        ]);
        while ($row = $stmt->fetch()) {
            array_push($partidas, Partida::fromArray($row));
        }

        return $partidas;
    }

    /**
     * @return Partida[]
     */
    public function findCalendario(): array
    {
        $partidas = [];
        $conn = $this->db->getConnection();

        $table = Partida::TABLE;
        $data = Partida::DATA;
        $partidaFlamengo = Partida::PARTIDA_FLAMENGO;
        $sql = "SELECT * FROM {$table} 
                WHERE {$partidaFlamengo} = :partidaFlamengo
                AND {$data} >= :data 
                ORDER BY {$data} ASC";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'partidaFlamengo' => true,
            'data' => time(),
        ]);
        while ($row = $stmt->fetch()) {
            array_push($partidas, Partida::fromArray($row));
        }

        return $partidas;
    }


    /**
     * @return Partida[]
     */
    public function findWithCampeonatoId(string $campeonatoId): array
    {
        $partidas = [];
        $conn = $this->db->getConnection();

        $table = Partida::TABLE;
        $campeonatoIdColumn = Partida::CAMPEONATO_ID;
        $sql = "SELECT * FROM {$table} 
                WHERE {$campeonatoIdColumn} = :campeonatoId";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['campeonatoId' => $campeonatoId]);
        while ($row = $stmt->fetch()) {
            array_push($partidas, Partida::fromArray($row));
        }

        return $partidas;
    }

    /**
     * @return Partida[]
     */
    public function findWithRodadaIndex(
        string $campeonatoId,
        int $rodadaIndex,
    ): array {
        $partidas = [];
        $conn = $this->db->getConnection();

        $table = Partida::TABLE;
        $campeonatoIdColumn = Partida::CAMPEONATO_ID;
        $rodadaIndexColumn = Partida::RODADA_INDEX;
        $sql = "SELECT * FROM {$table} 
                WHERE {$campeonatoIdColumn} = :campeonatoId 
                AND {$rodadaIndexColumn} = :rodadaIndex";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'campeonatoId' => $campeonatoId,
            'rodadaIndex' => $rodadaIndex,
        ]);
        while ($row = $stmt->fetch()) {
            array_push($partidas, Partida::fromArray($row));
        }

        return $partidas;
    }
}
