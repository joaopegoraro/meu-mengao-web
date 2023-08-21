<?php

declare(strict_types=1);

namespace App\Repository;

use App\Database\Database;
use App\Model\Noticia;

class NoticiasRepository
{

    private readonly Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * @return int the created id
     */
    public function create(Noticia $noticia): int
    {
        $conn = $this->db->getConnection();

        $table = Noticia::TABLE;
        $jaime = [
            Noticia::LINK,
            Noticia::TITULO,
            Noticia::DATA,
            Noticia::SITE,
            Noticia::LOGO_SITE,
            Noticia::FOTO,
        ];
        $stmt = $conn->prepare("INSERT INTO {$table}({...$jaime}) VALUES(?,?,?,?,?,?)");
        $stmt->execute([
            $noticia->link,
            $noticia->titulo,
            $noticia->data,
            $noticia->site,
            $noticia->logoSite,
            $noticia->foto,
        ]);

        return intval($conn->lastInsertId());
    }

    /**
     * @return []Noticia
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

    /**
     * @return bool true if everything went smoothly
     */
    public function removeWithSite(string $site): bool
    {
        $conn = $this->db->getConnection();
        $table = Noticia::TABLE;
        $siteColumn = Noticia::SITE;
        $stmt = $conn->prepare("DELETE FROM {$table} WHERE {$siteColumn} = ?");
        return $stmt->execute([$site]);
    }
}
