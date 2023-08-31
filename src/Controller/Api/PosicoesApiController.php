<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Core\ApiController;
use App\Http\Request;
use App\Http\Response;
use App\Repository\PosicaoRepository;

class PosicoesApiController extends ApiController
{

    private readonly PosicaoRepository $posicaoRepository;

    public function __construct(PosicaoRepository $posicaoRepository)
    {
        $this->posicaoRepository = $posicaoRepository;
    }

    public function findAllWithCampeonatoId(Request $request): Response
    {
    }
}
