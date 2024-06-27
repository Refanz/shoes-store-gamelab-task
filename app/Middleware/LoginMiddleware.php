<?php

namespace App\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

class LoginMiddleware
{
    public function __invoke(Request $request, Response $response, $next): Response
    {
        if (isset($_SESSION["auth"])) {
            return $response->withRedirect("/admin");
        }

        return $next($request, $response);
    }
}
