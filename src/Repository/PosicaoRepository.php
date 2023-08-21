<?php

declare(strict_types=1);

namespace App\Repository;

use App\Database\Database;
use App\Model\Partida;
use App\Model\Posicao;

class PosicaoRepository
{

    private readonly Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }


    /**
     * @return Partida[]
     */
    public function findWithCampeonatoId(string $campeonatoId): array
    {
        $posicoes = [];
        $conn = $this->db->getConnection();

        $table = Posicao::TABLE;
        $campeonatoIdColumn = Posicao::CAMPEONATO_ID;
        $sql = "SELECT * FROM {$table} 
                WHERE {$campeonatoIdColumn} = ?";
        $stmt = $conn->query($sql);
        $stmt->bindParam(1, $campeonatoId);
        while ($row = $stmt->fetch()) {
            array_push($posicoes, Posicao::fromArray($row));
        }

        return $posicoes;
    }
}
