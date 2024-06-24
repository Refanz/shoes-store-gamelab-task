<?php

use App\Controllers\ShoesController;
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

return function (App $app) {
    $container = $app->getContainer();

    /**
     * @var Twig $view
     */
    $view = $container->get('view');

    $app->get('/', function (Request $request, Response $response, array $args) use ($view) {
        return $view->render($response, 'user/index.html', $args);
    });

    $app->get('/admin', function (Request $request, Response $response, array $args) use ($view) {
        return $view->render($response, 'admin/index.html', $args);
    });

    $app->get('/admin/product-shoes/add-shoes', function (Request $request, Response $response, array $args) use ($view) {
        return $view->render($response, 'admin/product-shoes/add-shoes.html', $args);
    });


    $app->get('/admin/users/add-user', function (Request $request, Response $response, array $args) use ($view) {
        return $view->render($response, 'admin/user/add-user.html', $args);
    });

    $app->get('/admin/users/edit-user', function (Request $request, Response $response, array $args) use ($view) {
        return $view->render($response, 'admin/user/edit-user.html', $args);
    });

    $app->get('/admin/users/list-user', function (Request $request, Response $response, array $args) use ($view) {
        return $view->render($response, 'admin/user/list-user.html', $args);
    });

    $app->get('/admin/product-shoes/list-shoes', ShoesController::class . ':index');
    $app->post('/admin/product-shoes/add-shoes', ShoesController::class . ':insert');
    $app->get('/admin/product-shoes/edit-shoes/{id}', ShoesController::class . ':edit');
    $app->post('/admin/product-shoes/edit-shoes', ShoesController::class . ':update');
    $app->post('/admin/product-shoes/delete-shoes/{id}', ShoesController::class . ':delete');

    $app->get('/admin/shoes/{id}', ShoesController::class . ':get');
};
