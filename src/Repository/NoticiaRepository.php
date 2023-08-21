<?php

declare(strict_types=1);

namespace App\Repository;

use App\Database\Database;
use App\Model\Noticia;

class NoticiaRepository
{

    private readonly Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * @return Noticia[]
     */
    public function findAll(): array
    {
        $noticias = [];
        $conn = $this->db->getConnection();

        $table = Noticia::TABLE;
        $orderBy = Noticia::DATA;
        $stmt = $conn->query("SELECT * FROM {$table} ORDER BY {$orderBy} DESC");
        while ($row = $stmt->fetch()) {
            array_push($noticias, Noticia::fromArray($row));
        }

        return $noticias;
    }
}
