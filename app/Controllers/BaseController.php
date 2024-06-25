<?php

namespace App\Controllers;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Slim\Flash\Messages;
use Slim\Http\Response;
use Slim\Views\Twig;

class BaseController
{
    /**
     * @var ContainerInterface $container
     */
    protected $container;

    /**
     * @var Messages $flash
     */
    protected $flash;

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
        $this->container = $container;
        $this->flash = $this->container->get('flash');
        $this->view = $this->container->get('view');
    }

    protected function flashMessage($status, $message): void
    {
        $this->flash->addMessage($status, $message);
    }

    protected function getFlashMessage($key)
    {
        return $this->flash->getMessage($key);
    }

    protected function render(Response $response, $template, array $args): Response
    {
        return $this->view->render($response, $template, $args);
    }
}