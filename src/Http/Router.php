<?php

declare(strict_types=1);

namespace App\Http;

class Router
{
    /**
     * @param string[] $routes
     * @param callable(Request $request): Response $onMatch
     * @return void
     */
    public function get(array $routes, callable $onMatch): void
    {
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'GET') !== 0) {
            return;
        }

        $this->on($routes, $onMatch);
    }

    /**
     * @param string[] $routes
     * @param callable(Request $request): Response $onMatch
     * @return void
     */
    private function on(array $routes, callable $onMatch): void
    {
        $url = $_SERVER['REQUEST_URI'];

        foreach ($routes as $route) {
            // matches the $route and also any number of query parameters
            $regex = '#^' . str_replace('/', '\/', $route) . '(\?[\w\-=&]*|\/?)$#';

            // replaces and captures route params with regex. 
            // ex: '/myroute/{id}' is replaced with '/myroute/[\w-]+', and the 'id' 
            // can be captured with $matches['id'] 
            $regex = preg_replace(
                pattern: "/\{([\w-]+)\}/",
                replacement: "(?<$1>[\w\-]+)",
                subject: $regex,
            );

            $matches = [];
            if (preg_match_all($regex, $url, $matches)) {
                $body = json_decode(file_get_contents('php://input'), true) ?? [];
                foreach ($body as $key => $value) {
                    $body[$key] = filter_var($value, FILTER_UNSAFE_RAW);
                }

                $queryParams = [];
                foreach ($_GET as $key => $value) {
                    $queryParams[$key] = filter_input(INPUT_GET, $key, FILTER_UNSAFE_RAW);
                }

                $routeParams = [];
                foreach ($matches as $param => $valueArray) {
                    if (sizeof($valueArray) > 0) {
                        $routeParams[$param] = $valueArray[0];
                    }
                }

                $request = new Request(
                    method: trim($_SERVER['REQUEST_METHOD']),
                    url: $url,
                    headers: getallheaders(),
                    body: $body,
                    routeParams: array_filter($routeParams, 'is_string', ARRAY_FILTER_USE_KEY),
                    queryParams: $queryParams,
                    contentType: !empty($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : ''
                );

                /* @var Response $response */
                $response = $onMatch($request);
                $response->send();
            }
        }
    }
}
