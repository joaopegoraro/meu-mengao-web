<?php

declare(strict_types=1);

namespace App\Core;

use App\Http\Response;

abstract class ApiController
{

    protected function respond(
        int $status = 200,
        array $data = null,
    ): Response {
        return new Response(
            status: $status,
            headers: ['Content-Type' => 'application/json'],
            content: $data ? json_encode($data) : null,
        );
    }


    //	"type": "https://example.com/probs/out-of-credit",
    //	"title": "You do not have enough credit.",
    //	"detail": "Your current balance is 30, but that costs 50.",
    //	"instance": "/account/12345/msgs/abc",
    //	"status": 400,
    protected function respondError(
        int $status = 400,
        ?string $type = null,
        ?string $title = null,
        ?string $detail = null,
        ?string $instance = null,
    ): Response {
        $data = [];

        if ($type) $data['type'] = $type;
        if ($title) $data['title'] = $title;
        if ($detail) $data['detail'] = $detail;
        if ($instance) $data['instance'] = $instance;

        return $this->respond(
            status: $status,
            data: $data,
        );
    }
}
