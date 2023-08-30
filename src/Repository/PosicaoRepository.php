<?php

declare(strict_types=1);

namespace App\Repository;

use App\Database\Database;
use App\Model\Posicao;

class PosicaoRepository
{

    private readonly Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }


    /**
     * @return Posicao[]
     */
    public function findWithCampeonatoId(string $campeonatoId, ?int $limit = null): array
    {
        $posicoes = [];
        $conn = $this->db->getConnection();

        $table = Posicao::TABLE;
        $campeonatoIdColumn = Posicao::CAMPEONATO_ID;
        $posicaoColumn = Posicao::POSICAO;
        $sql = "SELECT * FROM {$table} 
                WHERE {$campeonatoIdColumn} = :campeonatoId
                ORDER BY {$posicaoColumn} + 0 ASC
               ";
        if ($limit) {
            $sql = $sql . " LIMIT {$limit}";
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute(['campeonatoId' => $campeonatoId]);
        while ($row = $stmt->fetch()) {
            array_push($posicoes, Posicao::fromArray($row));
        }

        return $posicoes;
    }
}
