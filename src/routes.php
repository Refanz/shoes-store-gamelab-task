<?php

use App\Controllers\AuthController;
use App\Controllers\Controller;
use App\Controllers\ReviewController;
use App\Controllers\ShoesController;
use App\Controllers\ShopController;
use App\Controllers\UserController;
use App\Middleware\AuthMiddleware;
use App\Middleware\LoginMiddleware;
use App\Middleware\RoleMiddleware;
use Slim\App;

return function (App $app) {

    $app->get('/', Controller::class . ':user');
    $app->get('/register', AuthController::class . ':formRegister');
    $app->post('/register', AuthController::class . ':register');

    $app->group("/shop", function () use ($app) {
        $app->get('', ShopController::class . ':index');
        $app->post('/cart', ShopController::class . ':addToCart');
        $app->post('/cart/update', ShopController::class . ':updateQuantity');
        $app->get('/cart', ShopController::class . ':cart');
    })->add(new AuthMiddleware($app->getContainer()));

    $app->group("", function () use ($app) {
        $app->get('/login', AuthController::class . ':formLogin');
        $app->post('/login', AuthController::class . ':login');
    })->add(new LoginMiddleware());

    $app->post('/logout', AuthController::class . ':logout');

    $app->group('/admin', function () use ($app) {
        $app->get('', Controller::class . ':admin');
        $app->get('/users/list-user', UserController::class . ':index');
        $app->get('/users/add-user', UserController::class . ':create');
        $app->post('/users/add-user', UserController::class . ':insert');
        $app->post('/users/delete-user/{id}', UserController::class . ':delete');
        $app->get('/users/edit-user/{id}', UserController::class . ':edit');
        $app->post('/users/edit-user/{id}', UserController::class . ':update');

        $app->get('/product-shoes/list-shoes', ShoesController::class . ':index');
        $app->post('/product-shoes/add-shoes', ShoesController::class . ':insert');
        $app->get('/product-shoes/edit-shoes/{id}', ShoesController::class . ':edit');
        $app->post('/product-shoes/edit-shoes', ShoesController::class . ':update');
        $app->post('/product-shoes/delete-shoes/{id}', ShoesController::class . ':delete');
        $app->get('/product-shoes/add-shoes', ShoesController::class . ':create');

        $app->get('/review-user/list-review', ReviewController::class . ':index');
    })->add(new RoleMiddleware())->add(new AuthMiddleware($app->getContainer()));
};
