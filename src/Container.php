<?php

declare(strict_types=1);

namespace App;

use App\Controller\ExampleController;
use App\Core\Renderer;
use App\Database\Database;
use App\Repository\NoticiasRepository;
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
     * @var NoticiasRepository $noticiasRepository
     */

    private readonly NoticiasRepository $noticiasRepository;

    public function getNoticiasRepository(): NoticiasRepository
    {
        return $this->noticiasRepository ?? $this->noticiasRepository = new NoticiasRepository(
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
