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
                WHERE {$partidaFlamengo} = ? 
                AND {$data} >= ? 
                LIMIT 1 
                ORDER BY {$data} ASC";
        $stmt = $conn->query($sql);
        $stmt->bindParam(1, true);
        $stmt->bindParam(2, time());
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
                WHERE {$partidaFlamengo} = ? 
                AND {$data} < ? 
                ORDER BY {$data} DESC";
        $stmt = $conn->query($sql);
        $stmt->bindParam(1, true);
        $stmt->bindParam(2, time());
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
                WHERE {$partidaFlamengo} = ? 
                AND {$data} >= ? 
                ORDER BY {$data} ASC";
        $stmt = $conn->query($sql);
        $stmt->bindParam(1, true);
        $stmt->bindParam(2, time());
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
                WHERE {$campeonatoIdColumn} = ?";
        $stmt = $conn->query($sql);
        $stmt->bindParam(1, $campeonatoId);
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
                WHERE {$campeonatoIdColumn} = ? 
                AND {$rodadaIndexColumn} = ?";
        $stmt = $conn->query($sql);
        $stmt->bindParam(1, $campeonatoId);
        $stmt->bindParam(2, $rodadaIndex);
        while ($row = $stmt->fetch()) {
            array_push($partidas, Partida::fromArray($row));
        }

        return $partidas;
    }
}
