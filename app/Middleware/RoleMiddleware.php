<?php

namespace App\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

class RoleMiddleware
{
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $user = $_SESSION['auth'];

        if ($user['role'] === 'admin') {
            return $next($request, $response);
        }

        return $response->withRedirect("/");
    }
}