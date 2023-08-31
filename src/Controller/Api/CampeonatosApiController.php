<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Core\ApiController;
use App\Http\Request;
use App\Http\Response;
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
    }
}
