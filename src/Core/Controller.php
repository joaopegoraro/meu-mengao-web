<?php

declare(strict_types=1);

namespace App\Core;

use App\Http\Response;

abstract class Controller
{

    protected readonly Renderer $renderer;

    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    protected function view(
        string $name,
        array $data = [],
        int $responseCode = 200,
        array $headers = [
            'Cache-Control' => 'max-age=31536000',
        ],
    ): Response {
        return new Response(
            status: $responseCode,
            headers: $headers,
            content: $this->renderer->render(
                view: $name,
                data: $data,
            ),
        );
    }

    function respond404(): Response
    {
        return $this->view(
            name: 'base',
            responseCode: 404,
            data: [
                'content' => '404',
                'description' => 'Não encontrado',
            ]
        );
    }
}
