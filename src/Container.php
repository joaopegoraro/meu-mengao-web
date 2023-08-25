<?php

declare(strict_types=1);

namespace App;

use App\Controller\NoticiasController;
use App\Controller\ResultadosController;
use App\Core\Renderer;
use App\Database\Database;
use App\Repository\CampeonatoRepository;
use App\Repository\NoticiaRepository;
use App\Repository\PartidaRepository;
use App\Repository\PosicaoRepository;
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
     * @var PartidaRepository $partidaRepository
     */

    private readonly PartidaRepository $partidaRepository;

    public function getPartidaRepository(): PartidaRepository
    {
        return $this->partidaRepository ?? $this->partidaRepository = new PartidaRepository(
            db: $this->getDatabase(),
        );
    }

    /**
     * @var PosicaoRepository $posicaoRepository
     */

    private readonly PosicaoRepository $posicaoRepository;

    public function getPosicaoRepository(): PosicaoRepository
    {
        return $this->posicaoRepository ?? $this->posicaoRepository = new PosicaoRepository(
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
     * @var NoticiasController $noticiasController
     */
    private readonly NoticiasController $noticiasController;

    public function getNoticiasController(): NoticiasController
    {
        return $this->noticiasController ?? $this->noticiasController = new NoticiasController(
            renderer: $this->getBaseRenderer(),
        );
    }

    /**
     * @var ResultadosController $resultadosController
     */
    private readonly ResultadosController $resultadosController;

    public function getResultadosController(): ResultadosController
    {
        return $this->resultadosController ?? $this->resultadosController = new ResultadosController(
            renderer: $this->getBaseRenderer(),
        );
    }
}
