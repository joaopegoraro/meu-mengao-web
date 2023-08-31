<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Core\ApiController;
use App\Http\Request;
use App\Http\Response;
use App\Model\Campeonato;
use App\Repository\CampeonatoRepository;

class CampeonatosApiController extends ApiController
{

    private readonly CampeonatoRepository $campeonatoRepository;

    public function __construct(CampeonatoRepository $campeonatoRepository)
    {
        $this->campeonatoRepository = $campeonatoRepository;
    }

    public function findAll(Request $request): Response
    {
        $campeonatos = $this->campeonatoRepository->findAll();

        if (sizeof($campeonatos) == 0) {
            return $this->respond(status: 204);
        }

        return $this->respond(
            data: array_map(
                fn (Campeonato $campeonato) => $campeonato->toArray(),
                $campeonatos,
            ),
        );
    }
}
