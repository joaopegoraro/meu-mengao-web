<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Core\ApiController;
use App\Http\Request;
use App\Http\Response;
use App\Model\Partida;
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
        $proximaPartida = $this->partidaRepository->findProximaPartida();
        if (!$proximaPartida) {
            return $this->respondError(404);
        }

        return $this->respond(data: $proximaPartida->toArray());
    }

    public function findResultados(Request $request): Response
    {
        $partidas = $this->partidaRepository->findResultados();

        if (sizeof($partidas) == 0) {
            return $this->respond(status: 204);
        }

        return $this->respond(
            data: array_map(
                fn (Partida $partida) => $partida->toArray(),
                $partidas,
            ),
        );
    }

    public function findCalendario(Request $request): Response
    {
        $partidas = $this->partidaRepository->findCalendario();

        if (sizeof($partidas) == 0) {
            return $this->respond(status: 204);
        }

        return $this->respond(
            data: array_map(
                fn (Partida $partida) => $partida->toArray(),
                $partidas,
            ),
        );
    }

    public function findAllWithRodadaIndex(Request $request): Response
    {
        $campeonatoId = $request->routeParams['campeonatoId'];
        if (!$campeonatoId) {
            return $this->respondError(
                detail: 'O campeonatoId precisa ser um id válido',
            );
        }

        $rodadaIndex = $request->routeParams['rodadaIndex'];
        if (!$rodadaIndex) {
            return $this->respondError(
                detail: 'A rodadaIndex precisa ser um index válido',
            );
        }

        $partidas = $this->partidaRepository->findWithRodadaIndex(
            campeonatoId: $campeonatoId,
            rodadaIndex: $rodadaIndex,
        );

        if (sizeof($partidas) == 0) {
            return $this->respondError(status: 404);
        }

        return $this->respond(
            data: array_map(
                fn (Partida $partida) => $partida->toArray(),
                $partidas,
            ),
        );
    }

    public function findAllWithCampeonatoId(Request $request): Response
    {
        $campeonatoId = $request->routeParams['campeonatoId'];
        if (!$campeonatoId) {
            return $this->respondError(
                detail: 'O campeonatoId precisa ser um id válido',
            );
        }

        $partidas = $this->partidaRepository->findWithCampeonatoId($campeonatoId);

        if (sizeof($partidas) == 0) {
            return $this->respondError(status: 404);
        }

        return $this->respond(
            data: array_map(
                fn (Partida $partida) => $partida->toArray(),
                $partidas,
            ),
        );
    }
}
