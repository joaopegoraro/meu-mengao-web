<?php

declare(strict_types=1);

namespace App\Repository;

use App\Database\Database;
use App\Model\Campeonato;

class CampeonatoRepository
{

    private readonly Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * @return Campeonato[]
     */
    public function findAll(): array
    {
        $campeonatos = [];
        $conn = $this->db->getConnection();

        $table = Campeonato::TABLE;
        $stmt = $conn->query("SELECT * FROM {$table}");
        while ($row = $stmt->fetch()) {
            array_push($campeonatos, Campeonato::fromArray($row));
        }

        return $campeonatos;
    }

    public function findById(string $id): Campeonato|null
    {
        $campeonato = null;
        $conn = $this->db->getConnection();

        $table = Campeonato::TABLE;
        $idColumn = Campeonato::ID;
        $stmt = $conn->query("SELECT * FROM {$table} WHERE {$idColumn} = ? LIMIT 1");
        $stmt->bindParam(1, $id);
        while ($row = $stmt->fetch()) {
            $campeonato = Campeonato::fromArray($row);
        }

        return $campeonato;
    }
}
