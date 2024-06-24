<?php

use Medoo\Medoo;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Slim\App;
use Slim\Http\Environment;
use Slim\Http\Uri;
use Slim\Views\PhpRenderer;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Slim\Flash\Messages;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new PhpRenderer($settings['template_path']);
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new Logger($settings['name']);
        $logger->pushProcessor(new UidProcessor());
        $logger->pushHandler(new StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    // medoo
    $container['db'] = function ($c) {
        return new Medoo([
            'database_type' => 'mysql',
            'server' => '127.0.0.1',
            'database_name' => 'db_brodo',
            'username' => 'root',
            'password' => '',
        ]);
    };

    // twig view
    $container['view'] = function ($container) {
        $view = new Twig('../templates', ['cache' => false]);
        $router = $container->get('router');
        $uri = Uri::createFromEnvironment(new Environment($_SERVER));
        $view->addExtension(new TwigExtension($router, $uri));
        return $view;
    };

    $container['upload_directory'] = __DIR__ . '/../public/assets/uploads';

    $container['flash'] = function () {
        return new Messages();
    };
};
