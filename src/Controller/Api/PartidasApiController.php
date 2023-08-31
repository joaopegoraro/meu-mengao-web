<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Core\ApiController;
use App\Http\Request;
use App\Http\Response;
use App\Repository\PartidaRepository;

class PartidasApiController extends ApiController
{

    private readonly PartidaRepository $partidaRepository;

    public function __construct(PartidaRepository $partidaRepository)
    {
        $this->partidaRepository = $partidaRepository;
    }

    public function findProximaPartida(Request $request): Response
    {
    }

    public function findResultados(Request $request): Response
    {
    }

    public function findCalendario(Request $request): Response
    {
    }

    public function findAllWithRodadaIndex(Request $request): Response
    {
    }

    public function findAllCampeonatoId(Request $request): Response
    {
    }
}
