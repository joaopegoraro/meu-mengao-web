<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\Controller;
use App\Http\Request;
use App\Http\Response;

class CalendarioController extends Controller
{

    public function index(Request $request): Response
    {
        return $this->view(
            name: 'base',
            data: [
                'content' => $this->renderer->render('calendario'),
                'styles' => ['calendario'],
            ],
        );
    }
}
