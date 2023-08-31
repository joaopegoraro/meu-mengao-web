<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Core\ApiController;
use App\Http\Request;
use App\Http\Response;
use App\Model\Posicao;
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
        $campeonatoId = $request->routeParams['campeonatoId'];
        if (!$campeonatoId) {
            return $this->respondError(
                detail: 'O campeonatoId precisa ser um id válido',
            );
        }

        $posicoes = $this->posicaoRepository->findWithCampeonatoId($campeonatoId);

        if (sizeof($posicoes) == 0) {
            return $this->respondError(status: 404);
        }

        return $this->respond(
            data: array_map(
                fn (Posicao $posicao) => $posicao->toArray(),
                $posicoes,
            ),
        );
    }
}
