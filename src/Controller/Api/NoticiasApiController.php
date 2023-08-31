<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Core\ApiController;
use App\Http\Request;
use App\Http\Response;
use App\Repository\NoticiaRepository;

class NoticiasApiController extends ApiController
{

    private readonly NoticiaRepository $noticiaRepository;

    public function __construct(NoticiaRepository $noticiaRepository)
    {
        $this->noticiaRepository = $noticiaRepository;
    }

    public function findAll(Request $request): Response
    {
        $noticias = $this->noticiaRepository->findAll();

        if (sizeof($noticias) == 0) {
            return $this->respond(status: 204);
        }

        return $this->respond(data: $noticias);
    }
}
