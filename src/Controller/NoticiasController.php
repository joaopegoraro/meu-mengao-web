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
        $nextMatchView = $this->renderer->render(
            view: 'components/partida',
        );
        $noticiasView = $this->renderer->render(
            view: 'noticias',
            data: ['nextMatch' => $nextMatchView],
        );
        return $this->view(
            name: 'base',
            data: [
                'content' => $noticiasView,
                'styles' => ['noticias', 'partida'],
            ],
        );
    }
}
