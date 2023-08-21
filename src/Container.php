<?php

declare(strict_types=1);

namespace App;

use App\Controller\ExampleController;
use App\Core\Renderer;
use App\Database\Database;
use App\Repository\CampeonatoRepository;
use App\Repository\NoticiaRepository;
use PDO;

class Container
{
    /**
     * @var PDO $pdo
     */

    private readonly PDO $pdo;

    public function getPDO(): PDO
    {
        return $this->pdo ?? $this->pdo = new PDO(
            dsn: "mysql:host=localhost;dbname=meu_mengao",
            username: "admin",
            password: "password",
        );
    }

    /**
     * @var Database $database
     */

    private readonly Database $database;

    public function getDatabase(): Database
    {
        return $this->database ?? $this->database = new Database(
            connection: $this->getPDO(),
        );
    }

    /**
     * @var NoticiasRepository $noticiaRepository
     */

    private readonly NoticiaRepository $noticiaRepository;

    public function getNoticiaRepository(): NoticiaRepository
    {
        return $this->noticiaRepository ?? $this->noticiaRepository = new NoticiaRepository(
            db: $this->getDatabase(),
        );
    }

    /**
     * @var CampeonatoRepository $campeonatoRepository
     */

    private readonly CampeonatoRepository $campeonatoRepository;

    public function getCampeonatoRepository(): CampeonatoRepository
    {
        return $this->campeonatoRepository ?? $this->campeonatoRepository = new CampeonatoRepository(
            db: $this->getDatabase(),
        );
    }

    /**
     * @var Renderer $baseRenderer
     */

    private readonly Renderer $baseRenderer;

    public function getBaseRenderer(): Renderer
    {
        return $this->baseRenderer ?? $this->baseRenderer = new Renderer(
            path: App::$ROOT_DIR,
        );
    }

    /**
     * @var ExampleController $exampleControlelr
     */
    private readonly ExampleController $exampleController;

    public function getExampleController(): ExampleController
    {
        return $this->exampleController ?? $this->exampleController = new ExampleController(
            renderer: $this->getBaseRenderer(),
        );
    }
}
