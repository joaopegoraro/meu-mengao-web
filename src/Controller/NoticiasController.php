<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\Controller;
use App\Http\Request;
use App\Http\Response;

class NoticiasController extends Controller
{

    public function index(Request $request): Response
    {
        $nextMatch = $this->renderer->render('components/partida');

        $noticias = $this->renderer->render(
            view: 'noticias',
            data: ['nextMatch' => $nextMatch],
        );

        return $this->view(
            name: 'base',
            data: [
                'content' => $noticias,
                'styles' => ['noticias', 'partida'],
            ],
        );
    }
}
