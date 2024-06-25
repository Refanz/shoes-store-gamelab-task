<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class Controller extends BaseController
{
    public function user(Request $request, Response $response, array $args): Response
    {
        return $this->render($response, 'user/index.html', $args);
    }

    public function admin(Request $request, Response $response, array $args): Response
    {
        return $this->render($response, 'admin/index.html', [
            "active" => "index-admin"
        ]);
    }
}