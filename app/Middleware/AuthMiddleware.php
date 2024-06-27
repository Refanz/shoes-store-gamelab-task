<?php

namespace App\Middleware;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

class AuthMiddleware
{

    /**
     * @var Twig $view
     */
    protected $view;

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __construct(ContainerInterface $container)
    {
        $this->view = $container->get('view');
    }

    public function __invoke(Request $request, Response $response, callable $next)
    {
        if (!isset($_SESSION['auth'])) {
            return $response->withRedirect('/login');
        }

        $this->view->getEnvironment()->addGlobal('auth', $_SESSION["auth"]);

        return $next($request, $response);
    }
}
